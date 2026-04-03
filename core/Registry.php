<?php
namespace core;
final class Registry{
    private $data = [];

    public function get($key) {
        if(isset($this->data[$key])){
            return $this->data[$key];
        }else{
            return null;
        }
//        if (array_key_exists($key, $this->data)) {
//            return $this->data[$key];
//        }
    }

    public function set($key, $value){
        return $this->data[$key] = $value;
    }

    public function has($key){
        if(isset($this->data[$key])){
            return true;
        }else{
            return false;
        }
    }

    public function __construct()
    {
        echo __FILE__ . "<br>";
    }

}