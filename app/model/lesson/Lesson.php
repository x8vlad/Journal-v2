<?php

namespace app\model\lesson;
class Lesson extends \core\Model
{
    private $db;

    public function __construct($registry)
    {
        $this->db = $registry->get('db');
    }

    // show shedule
    public function showSchedule($day)
    {
        $query_schedule = "SELECT 
            lessens.num_less AS num_less, subjects.name AS name_subject, 
            lessens.start_time AS start_less, lessens.end_time AS end_less, 
            lessens.classroom AS classroom 
            FROM lessens 
                INNER JOIN subjects ON lessens.sub_id=subjects.id 
                    WHERE lessens.weekday=:weekday
                        ORDER BY lessens.num_less ASC";

        $stmt = $this->db->connect()->prepare($query_schedule);
        $stmt->bindParam(":weekday", $day);
        $stmt->execute();
        $schedule = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $schedule;
    }

}