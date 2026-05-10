<?php
namespace app\controller\account;

use core\Controller;
class Auth extends Controller
{
    public function index(){
        $this->render("account/auth", $data_for_auth = []);
    }
}