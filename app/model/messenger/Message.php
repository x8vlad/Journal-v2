<?php

namespace app\model\messenger;

use core\Model;

class Message extends Model
{
    private $db;
    //db
    public function __construct($registry)
    {
        $this->db = $registry->get('db');
    }

    public function allUser()
    {
        $query = "SELECT id,login FROM `users` ORDER BY id ASC";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute();

        $data_user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data_user;
    }

    public function certainUser($roleSelected)
    {
        $query = "SELECT id,login FROM `users` WHERE role = :user ORDER BY id ASC";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->bindValue(":user", $roleSelected);
        $stmt->execute();

        $data_user_role = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data_user_role;
    }
}