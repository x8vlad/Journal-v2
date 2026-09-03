<?php
namespace app\controller\lesson;

use core\Controller;

class LessonController extends Controller
{
    public function index(){
        $day = $_GET['activePage'] ?? 1;
        $schedule = $this->load->model("lesson/Lesson")->showSchedule($day);
//        echo "<pre>";
//        var_dump($schedule);
//        echo "<pre>";
//        die;
        $data_for_lesson_view = [
            'test_content' => 'Test content from a lesson controller!',
            'schedule' => $schedule
        ];

        $this->render("lesson/lesson_view", $data_for_lesson_view);
    }
}