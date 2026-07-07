<?php

namespace app\model\messenger;

use core\Model;

class Message extends Model
{
    protected $registry;
    //db
    public function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function allUser()
    {
        $query = "SELECT id,login FROM `users` ORDER BY id ASC";
        $stmt = $this->registry->db->connect()->prepare($query);
        $stmt->execute();

        $data_user = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data_user;
    }

    public function certainUser($roleSelected)
    {
        $query = "SELECT id,login FROM `users` WHERE role = :users ORDER BY id ASC";
        $stmt = $this->registry->db->connect()->prepare($query);
        $stmt->bindValue(":users", $roleSelected);
        $stmt->execute();

        $data_user_role = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $data_user_role;
    }
}