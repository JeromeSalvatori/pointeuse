<?php

class ChronoController extends AbstractController {
    public function launch() {
        $data = [];
        $data['loggedStatus'] = $this->isLogged();
        if (isset($_POST['temps'])) {
            $this->main_controller->getManager()->newEntry($this->formatDTI($_POST['debut']), $this->formatDTI($_POST['fin']), $_POST['temps']/1000);
        }
        $data['dernieres_entrees'] = $this->main_controller->getManager()->selectEntries(0, 5);
        
        $this->requireView($this->getPath(), $data);
    }
    
    private function formatDTI($ts) {
        return date('Y-m-d H:i:s', $ts/1000);
    }
}