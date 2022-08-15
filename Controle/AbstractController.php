<?php

abstract class AbstractController {
    protected $main_controller;
    
    public function __construct(MainController $main_controller) {
        $this->main_controller = $main_controller;
    }
    
    abstract public function launch();
    
    protected function isLogged() {
        if($this->main_controller->getHTTPOps()->checkLogged()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    protected function getPath() {
        $l = strlen(get_class($this)) - 10;
        $module = strtolower(substr(get_class($this), 0, $l));
        $path_json = file_get_contents('../config/path.json');
        $path_list = json_decode($path_json, TRUE);
        return $path_list[$module];
    }
    
    protected function requireView($path, array $data) {
        require $path;
    }
}