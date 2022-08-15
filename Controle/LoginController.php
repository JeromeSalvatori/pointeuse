<?php

class LoginController extends AbstractController {
    public function launch() {
        $data = [];
        if(!$data['loggedStatus'] = $this->isLogged()) {
            if (isset($_POST['username']) && (!$this->checkLogin())) {
            $data['login_failed'] = TRUE;
            } elseif (isset($_POST['username']) && ($user_info = $this->checkLogin())) {
                $this->main_controller->getHTTPOps()->createLoggedStatus($user_info);
                header('Location: index.php');
            }
        } elseif (isset($_GET['task']) && $_GET['task'] == 'logout') {
            $this->main_controller->getHTTPOps()->logOut();
            $data['logged_out'] = true;
            $data['loggedStatus'] = false;
        }
        
        $this->requireView($this->getPath(), $data);
        
    }
    
    private function checkLogin() {
        if (!$result = $this->main_controller->getManager()->getUser($_POST['username'])) {
            return false;
        } elseif (!password_verify($_POST['mdp'], $result['mdp'])) {
            return false;
        } else {
            return $result;
        }
    }
}