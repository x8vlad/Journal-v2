<?php

namespace app\controller\announcement;

use core\Controller;

class AnnouncementController extends Controller
{
    public function index(){


        $this->render('announcement/announcement_view', []);
    }
}