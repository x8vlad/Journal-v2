<?php
namespace app\controller\lesson;

use core\Controller;

class LessonController extends Controller
{
    public function index(){
        $day = 3; // I need change it via session or idk
//      $this->load->model("TestModel")->testM(); // if u use ->model u need to write namespace (Loader 31 line)
        $schedule = $this->load->model("lesson/Lesson")->showSchedule($day);
        $data_for_lesson_view = [
            'test_content' => 'Test content from a lesson controller!',
            'schedule' => $schedule
        ];

        $this->render("lesson/lesson_view", $data_for_lesson_view);
    }
}