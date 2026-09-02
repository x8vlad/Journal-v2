<?php
namespace app\model;
use app\service\logger\FileLogger; // !!!

class User extends \core\Model
{
    protected $registry;
    private $db;


    public function __construct($registry)
    {
//        $this->logger = $registry->get('logger');

        $this->db = $registry->get('db'); // di
//        $this->logger = $registry->get('logger'); // di
    }

    //'SELECT * FROM `users` WHERE email LIKE "%_s%"' && 'SELECT * FROM `users` WHERE email LIKE "%_t%"'
    public function setRole($email, $role){
        $query_update_user = 'UPDATE `users` SET role = :role WHERE email=:email';
        $stmt = $this->db->connect()->prepare($query_update_user);
//        $stmt = Dbh::getInstance()->connect()->prepare($query_update_user);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    // methods for register:
    public function setUser($login, $email, $pwd, $role) : bool {
        $query_insert = 'INSERT INTO `users` (login,email,pass,role) VALUES (?,?,?,?)';
        $stmt = $this->db->connect()->prepare($query_insert);

//        $stmt = Dbh::getInstance()->connect()->prepare($query_insert);
        // hardcode
        $logger = new FileLogger();
        // hash the pwd :)
        $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
        try{
            $success_result = $stmt->execute(array($login, $email, $hash_pwd, $role));
            // second line
            if($success_result){
//                $this->logger->info("User added successfully: " . $login);
                $logger->info("User added successfully: " . $login);
            }else{
                $logger->warning("Warning in adding user, trouble with inserting at DB: " . $login);
            }
            return $success_result;
        }catch (\PDOException $error){
            $logger->error("DB Failed: " . $login . "error:" . $error->getMessage());
            //
            return false;
        }
    }
    public function isUserExists($login, $email){
        $query_select = 'SELECT * FROM `users` WHERE login = ? OR email = ?';

        $stmt = $this->db->connect()->prepare($query_select);

        if(!$stmt->execute(array($login, $email))){
            $stmt = null;
        }

        $isInsetsUser = false;
        if($stmt->rowCount() > 0){$isInsetsUser = true;}
        else{$isInsetsUser = false;}
        return $isInsetsUser;
    }
    // methods for login:
    public function selectUser($login, $password){
        try {
            $query_select = 'SELECT * FROM `users` WHERE login = :login';
            $stmt = $this->db->connect()->prepare($query_select);
            $stmt->execute(array(':login' => $login));

            if($stmt->rowCount() > 0){
                $row = $stmt->fetch(\PDO::FETCH_ASSOC);

                $password_hash = $row['pass']; // pass from db (column name)

                if(password_verify($password, $password_hash)){
                    $_SESSION['login'] = $login;
                    return true;
                }
                return false;
            }
        } catch (\PDOException $error){
            $logger = new FileLogger();
            $logger->error("DB Failed: " . $login . "error:" . $error->getMessage());
        }
        return false;
    }


}