<?php
require_once CORE.'/Connection.php';

class Model
{
    protected static $table = '';
    protected static $pk = '';

    protected $conn;

    public function __construct() {
        $this->conn = Connection::connect();
    }

    public function all(){
        $stmt = $this->conn->prepare("SELECT * FROM ". static::$table);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Get an item by the primarykey
     */
    public function getByPK($value){
        $stmt = $this->conn->prepare("SELECT * FROM ". static::$table." WHERE ". static::$pk . "=". $value);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function save($parameters){
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            static::$table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parameters);
    }

    public function update($id, $parameters){
        $keys = array();
        foreach ($parameters as $key => $value) {
            array_push($keys, $key."='".$value."'");
        }
        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s = %s',
            static::$table,
            implode(",", $keys), static::$pk, $id
        );
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parameters);
    }

    /**
     * Delete this item data from database
     */
    public function destroy($id){
        $stmt = $this->conn->prepare("DELETE FROM " . static::$table . " WHERE ".static::$pk."=? LIMIT 1");
        $stmt->execute([$id]);
    }
}