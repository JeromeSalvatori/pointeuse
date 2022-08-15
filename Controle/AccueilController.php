<?php

class AccueilController extends AbstractController {
    public function launch() {
        $data = [];
        $data['loggedStatus'] = $this->isLogged();
        $data['dernieres_entrees'] = $this->main_controller->getManager()->selectEntries(0, 5);
        
        $this->requireView($this->getPath(), $data);
    }
}