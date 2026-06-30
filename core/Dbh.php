<?php
namespace core;
use PDO;
use PDOException;
final class Dbh {
    protected $registry;
//    private static $InstanceDB;
    private $connection;

    public function __construct($registry)
    {
     
        try{
            $this->registry=$registry;
            $this->connection = new PDO("mysql:host=mariadb;dbname=journal", "root", "root");
            // if Ill have any errors pdo will be send to me always exceptions (for debug)
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->exec("set names utf8");
        }catch(PDOException $error){
            print "Oops, error: " . $error->getMessage() . "<br>";
            die();
        }
    }

//    public static function getInstance(){
//        if(self::$InstanceDB == null) {self::$InstanceDB = new Dbh($registry);}
//        return self::$InstanceDB;
//    }

    public function connect(){return $this->connection;}

    public function queryByID($query, $id){
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id);

        echo "😁";

        $stmt->execute(array("id" => $id));

        // var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
        // var_dump($stmt->fetch(PDO::FETCH_ASSOC));
        // var_dump($stmt->fetch(PDO::FETCH_ASSOC));
        // die;

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}