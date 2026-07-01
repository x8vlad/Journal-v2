<?php

namespace app\controller\lesson;

use core\Controller;

class LessonController extends Controller
{
    public function index(){
//        $this->load->model("TestModel")->testM();

        $data_for_lesson_view = [
            'test_content' => 'Test content from a lesson controller!'
        ];

        $this->render("lesson/lesson_view", $data_for_lesson_view);
    }
}