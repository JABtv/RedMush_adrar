<?php
/**
 * Classe Database - Gestionnaire de base de données
 * Gère toutes les opérations de base de données pour l'application
 */
class Database {
    
    // Propriétés de connexion
    private $pdo;
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $options;
    
    /**
     * Constructeur - Initialise les paramètres de connexion
     */
    public function __construct($host = 'localhost', $dbname = '', $username = '', $password = '') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        
        // Options PDO par défaut pour la sécurité et performance
        $this->options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    }
    
    /**
     * Établit la connexion à la base de données
     * @return bool
     */
    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
            $this->pdo = new PDO($dsn, $this->username, $this->password, $this->options);
            return true;
        } catch(PDOException $e) {
            error_log("Erreur de connexion DB: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Retourne l'instance PDO (se connecte automatiquement si nécessaire)
     * @return PDO|null
     */
    public function getPDO() {
        if (!$this->pdo && !$this->connect()) {
            return null;
        }
        return $this->pdo;
    }
    
    /**
     * Vérifie si un utilisateur existe par email
     * @param string $email
     * @return bool
     */
    public function emailExists($email) {
        $pdo = $this->getPDO();
        if (!$pdo) return false;
        
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }
    
    /**
     * Crée un nouveau utilisateur
     * @param array $userData ['nom', 'email', 'telephone', 'adresse', 'password']
     * @return int|false ID de l'utilisateur créé ou false en cas d'erreur
     */
    public function createUser($userData) {
        $pdo = $this->getPDO();
        if (!$pdo) return false;
        
        try {
            // Hash du mot de passe
            $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO users (nom, email, telephone, adresse, mot_de_passe, date_inscription) 
                    VALUES (?, ?, ?, ?, ?, NOW())";
            
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                $userData['nom'],
                $userData['email'],
                $userData['telephone'] ?? null,
                $userData['adresse'] ?? null,
                $hashedPassword
            ]);
            
            return $result ? $pdo->lastInsertId() : false;
            
        } catch(PDOException $e) {
            error_log("Erreur création utilisateur: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Authentifie un utilisateur par email/mot de passe
     * @param string $email
     * @param string $password
     * @return array|false Données utilisateur ou false
     */
    public function authenticateUser($email, $password) {
        $pdo = $this->getPDO();
        if (!$pdo) return false;
        
        try {
            $stmt = $pdo->prepare("SELECT id, nom, email, mot_de_passe FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            
            if ($user && password_verify($password, $user['mot_de_passe'])) {
                // Enlever le mot de passe des données retournées
                unset($user['mot_de_passe']);
                return $user;
            }
            
            return false;
            
        } catch(PDOException $e) {
            error_log("Erreur authentification: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Récupère les informations complètes d'un utilisateur par ID
     * @param int $userId
     * @return array|false
     */
    public function getUserById($userId) {
        $pdo = $this->getPDO();
        if (!$pdo) return false;
        
        try {
            $stmt = $pdo->prepare("SELECT id, nom, email, telephone, adresse, date_inscription FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            return $stmt->fetch();
        } catch(PDOException $e) {
            error_log("Erreur récupération utilisateur: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Met à jour les informations d'un utilisateur
     * @param int $userId
     * @param array $userData
     * @return bool
     */
    public function updateUser($userId, $userData) {
        $pdo = $this->getPDO();
        if (!$pdo) return false;
        
        try {
            $sql = "UPDATE users SET nom = ?, telephone = ?, adresse = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute([
                $userData['nom'],
                $userData['telephone'] ?? null,
                $userData['adresse'] ?? null,
                $userId
            ]);
        } catch(PDOException $e) {
            error_log("Erreur mise à jour utilisateur: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Exécute une requête personnalisée (pour les cas spéciaux)
     * @param string $sql
     * @param array $params
     * @return PDOStatement|false
     */
    public function query($sql, $params = []) {
        $pdo = $this->getPDO();
        if (!$pdo) return false;
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            error_log("Erreur requête custom: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Démarre une transaction
     * @return bool
     */
    public function beginTransaction() {
        $pdo = $this->getPDO();
        return $pdo ? $pdo->beginTransaction() : false;
    }
    
    /**
     * Confirme une transaction
     * @return bool
     */
    public function commit() {
        return $this->pdo ? $this->pdo->commit() : false;
    }
    
    /**
     * Annule une transaction
     * @return bool
     */
    public function rollback() {
        return $this->pdo ? $this->pdo->rollback() : false;
    }
    
    /**
     * Ferme la connexion
     */
    public function disconnect() {
        $this->pdo = null;
    }
    
    /**
     * Vérifie si la connexion est active
     * @return bool
     */
    public function isConnected() {
        return $this->pdo !== null;
    }
}

/**
 * Exemple d'utilisation :
 * 
 * // Configuration
 * $db = new Database('localhost', 'ma_boutique', 'username', 'password');
 * 
 * // Pour l'inscription
 * $userData = [
 *     'nom' => 'Jean Dupont',
 *     'email' => 'jean@example.com',
 *     'telephone' => '0612345678',
 *     'adresse' => '123 Rue de la Mode',
 *     'password' => 'monmotdepasse123'
 * ];
 * 
 * if (!$db->emailExists($userData['email'])) {
 *     $userId = $db->createUser($userData);
 *     if ($userId) {
 *         echo "Inscription réussie ! ID: " . $userId;
 *     }
 * }
 * 
 * // Pour la connexion
 * $user = $db->authenticateUser('jean@example.com', 'monmotdepasse123');
 * if ($user) {
 *     $_SESSION['user'] = $user;
 *     echo "Connexion réussie !";
 * }
 */
?>