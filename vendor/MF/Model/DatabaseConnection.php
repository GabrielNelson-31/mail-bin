<?php
namespace MF\Model;

define("HOST_NAME","localhost");
define("DB_NAME","db_mail_bin");
define("USER_NAME","root");
define("PASSWORD","");


class DatabaseConnection {
    private static ?DatabaseConnection $instance = null;
    private \PDO $connection = null;

    private string $host = HOST_NAME;
    private string $db   = DB_NAME;
    private string $user = USER_NAME;
    private string $pass = PASSWORD;
    private string $charset = 'utf8mb4';

    // Construtor privado impede a criação direta com o operador 'new'
    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION, // Lança exceções em erros de SQL
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,       // Retorna arrays associativos por padrão
            \PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa prepared statements reais
        ];

        try {
            $this->connection = new \PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            // Tratamento de erro seguro: loga o erro internamente e exibe uma mensagem amigável
            // Nunca exiba '$e->getMessage()' diretamente em produção para evitar expor dados sensíveis do servidor
            error_log("Erro de conexão: " . $e->getMessage());
            throw new \RuntimeException("Não foi possível conectar ao banco de dados. Tente novamente mais tarde.");
        }
    }

    // Método estático para obter a instância única (Singleton)
    public static function getInstance(): DatabaseConnection {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Retorna a conexão ativa do PDO
    public function getConnection(): \PDO {
        return $this->connection;
    }
}