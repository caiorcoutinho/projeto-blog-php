<?php 
declare (strict_types=1);
namespace Caiorcoutinho\Peagape;

use PDO;
use PDOException;
use PDOStatement;

class Database {

    const HOST = 'localhost';
    const DBNAME = 'blog_peagape';
    const USER = 'root';
    const PASSW = '1234';

    private PDO $connection;

    public function __construct(private string $table){
        $this->connect();
    }

    public function connect(): bool {
        try{
            $this->connection = new PDO(
            'mysql:host='.SELF::HOST.';dbname='.SELF::DBNAME,
            SELF::USER,
            SELF::PASSW
            );
            return true;
        } catch (PDOException $erro) {
            die("ERRO => " . $erro->getMessage());
            return false;
        } 
    }

    public function execute(string $query, array $params=[]): PDOStatement {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $erro) {
            die("ERRO => ".$erro->getMessage());
        }
    }

    public function create(array $values): string {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = 'INSERT INTO '. $this->table .' ('. implode(',', $fields).') VALUES ('. implode(',', $binds).')';

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertId();

    }

    public function read(
        string|null $where = null, 
        string|null $order = null, 
        string|null $limit = null, 
        string $fields = '*'
        ): PDOStatement {
            $where = is_null($where) ? '' : 'WHERE '.$where;
            $order = is_null($order) ? '' : 'ORDER BY '.$order;
            $limit = is_null($limit) ? '' : 'LIMIT '.$limit;

            $query = 'SELECT '.$fields.' FROM '.$this->table. ' ' .$where. ' ' .$order. ' ' .$limit;

            return $this->execute($query);
    }


}
?>