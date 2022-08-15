<?php

class MainController {
    private $_manager;
    private $_http_ops;
    private $_controller;
    
    public function __construct(Manager $manager, HTTPops $http_ops) {
        $this->_manager = $manager;
        $this->_http_ops = $http_ops;
    }
    
    public function pickController() {
        if (!$this->_http_ops->checkLogged()) {
            if (!empty($_GET)) {
                header('Location: index.php');
            }
            
            $this->addController('login');
            return;
        }
        
        if (!isset($_GET['page'])) {
            $this->addController('accueil');
            return;
        }
        
        $get_json = file_get_contents('../config/get.json');
        $get_list = json_decode($get_json, TRUE);
        foreach ($_GET as $k => $v) {
            $paire = -1;
            foreach ($get_list['GET_pairs'] as $nv) {
                if ($k == $nv['GET_key']) {
                    $paire++;
                }
                if (in_array($v, $nv['GET_values'])) {
                    $paire++;
                }
                if ($paire < 1) {
                    $paire = -1;
                }
            }
        }
        if ($paire < 1) {
            header('Location: index.php');
        }
        
        $this->addController($_GET['page']);
    }
    
    public function getManager() {
        return $this->_manager;
    }
    
    public function getHTTPOps() {
        return $this->_http_ops;
    }
    
    private function addController($prefix) {
        $classname = ucfirst($prefix) . 'Controller';
        $instance = new $classname($this);
        $this->_controller = $instance;
    }
    
    public function getController() {
        return $this->_controller;
    }
}