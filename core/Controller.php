<?php
    namespace core;
    abstract class Controller{
        public function render($view_path, $data = []) {
            $header = $this->load->view('common/header', $data); // render by default header
            $content = $this->load->view($view_path, $data); // content using it in ur controller
            $footer = $this->load->view('common/footer', $data); // render by default footer

            echo $header . $content . $footer;
        }

        protected $registry;

        public function __construct($registry)
        {
            $this->registry=$registry;
        }

        public function __get($key){
            return $this->registry->get($key);
        }

        public function __set($key, $value){
            $this->registry->set($key, $value);
        }
    }