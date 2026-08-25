<?php

namespace app\model\announcement;

use core\Model;

class Announcement extends Model
{
    private $db;

    public function __construct($registry)
    {
        $this->db = $registry->get('db');
    }

    public function getAnnouncements() {
        $get_announcements = "SELECT * FROM `announcement`";
        $stmt = $this->db->connect()->prepare($get_announcements);
        $stmt->execute();
        $announcements = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $announcements;

        /*
        [
            0 => [
                'id' => '1',
                'title' => 'first',
                'content' => 'text announ 1'
            ],
            1 => [
                'id' => '2',
                'title' => 'secnd',
                'content' => 'text announ 2'
            ]
        ]
        */
    }
}