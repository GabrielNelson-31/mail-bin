<?php
namespace App\Models;

use MF\Model\DatabaseConnection;
use MF\Model\Model;
class UserModel extends Model
{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;

    function findUserById(int $id) : array {
        $query = "select * from users where id = ?";
        try {
            $db = new DatabaseConnection();
            $this->db = $db;
            $stmt = $this->getDb()->prepare($query);
            
            $stmt->execute([$id]);
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
            return $resultado;
            
        } catch (\PDOException $th) {
            return [];
        }   
    }
}

?>