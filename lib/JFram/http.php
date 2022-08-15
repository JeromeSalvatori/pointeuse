<?php

class HTTPops {
    private $_manager;
    
    public function __construct(Manager $manager) {
        session_start();
        $this->_manager = $manager;
    }
    
    private function checkLoginToken() {
        if (!isset($_COOKIE['login_token']) || !isset($_COOKIE['user_id'])) {
            return false;
        }
        $row_token_db = $this->_manager->getToken(intval($_COOKIE['user_id']));
        $token_db = $row_token_db['login_token'];
        if (hash('sha384', $_COOKIE['login_token']) === $token_db) {
            return true;
        }
    }
    
    public function checkLogged() {
        if (!isset($_SESSION['user_id'])) {
            if (!$this->checkLoginToken()) {
                return false;
            }
            $_SESSION['user_id'] = intval($_COOKIE['user_id']);
            return true;
        }
        return true;
    }
    
    public function createLoggedStatus(array $user_info) {
        $_SESSION['user_id'] = $user_info['id'];
        setcookie('user_id', $user_info['id'], time()+60*60*24*30);
        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        setcookie('login_token', $token, time()+60*60*24*30);
        $hashed_token = hash('sha384', $token);
        $this->_manager->insertToken($user_info['id'], $hashed_token);
    }
    
    public function logOut() {
        if(!isset($_SESSION['user_id'])) { 
            return; //si aucune session donc fonction lancée par erreur (exemple : précédent), rien ne se passe
        } else {
            $user_id = $_SESSION['user_id'];
        }
        unset($_SESSION['user_id']);
        unset($_COOKIE['user_id']);
        setcookie('user_id', null, 1);
        unset($_COOKIE['login_token']);
        setcookie('login_token', null, 1);
        $this->_manager->deleteToken($user_id);
    }
}
            
