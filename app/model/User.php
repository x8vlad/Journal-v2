<?php
namespace app\model;
class User
{
    private $db;

    public function __construct($registry)
    {
        $this->db = $registry->get('db'); // di
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


    public function setUser($login, $email, $pwd, $role) : bool {
        $query_insert = 'INSERT INTO `users` (login,email,pass,role) VALUES (?,?,?,?)';
        $stmt = $this->db->connect()->prepare($query_insert);

//        $stmt = Dbh::getInstance()->connect()->prepare($query_insert);

        // hash the pwd :)
        $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

        try{
            $success_result = $stmt->execute(array($login, $email, $hash_pwd, $role));

            if($success_result){
                file_put_contents("../logs/testSystem.log", "User added successfully: $login \n", FILE_APPEND);
            }else{
                file_put_contents("../logs/testSystem.log", "DB INSERT FAILED for $login: " . "ttrouble with inserting at DB" . "\n", FILE_APPEND);
            }

            return $success_result;
        }catch (\PDOException $error){
            file_put_contents("../logs/testSystem.log", "DB INSERT FAILED for $login: " . $error->getMessage() . "\n", FILE_APPEND);
            return false;
        }

        // if(!$stmt->execute(array($login, $email, $hash_pwd, $role))){
        //     $stmt = null;
        //     // header("Location: ../view/main.tpl.php?error=smthfail");
        //     // exit();
        // }
    }

    public function isUserExists($login, $email){
        $query_select = 'SELECT * FROM `users` WHERE login = ? OR email = ?';

        $stmt = $this->db->connect()->prepare($query_select);

        //        $stmt = Dbh::getInstance()->connect()->prepare($query_select);

        if(!$stmt->execute(array($login, $email))){
            $stmt = null;
            // header("Location: ../view/main.tpl.php?error=smthfail");
            // exit();
        }
        // если найдено больше нуля юзер то значит он уже есть в бд и не надо добавлять и регестривть
        $isInsetsUser = false;
        if($stmt->rowCount() > 0){$isInsetsUser = true;}
        else{$isInsetsUser = false;}
        return $isInsetsUser;
    }
}