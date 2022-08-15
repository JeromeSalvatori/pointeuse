<?php

class GestionController extends AbstractController {
    public function launch() {
        $data = [];
        $data['loggedStatus'] = $this->isLogged();
        if (isset($_POST['modifier'])) {
            $arr_size = count($_POST['select-entry']);
            if ($arr_size > 1) {
                $data['ligne_modif'] = $this->main_controller->getManager()->selectEntriesFromId($_POST['select-entry']);
            } else {
                $data['ligne_modif'] = $this->main_controller->getManager()->selectEntry($_POST['select-entry'][0]);
            }
        } elseif (isset($_GET['opt']) && $_GET['opt'] == 'newE') {
            $data['aff-newE'] = TRUE;
        } elseif (isset($_GET['opt']) && $_GET['opt'] == 'SBD') {
            $data['aff-SBD'] = TRUE;
        } else {
            if (isset($_POST['supprimer'])) {
                $arr_size = count($_POST['select-entry']);
                if ($arr_size > 1) {
                    if($this->main_controller->getManager()->deleteMultipleFromId($_POST['select-entry'])) {
                        $data['supprimem'] = TRUE;
                    }  
                } else {
                    if($this->main_controller->getManager()->DeleteFromId($_POST['select-entry'][0])) {
                        $data['supprime'] = TRUE;
                    }
                }
                $this->dataNorm($data);
            }  elseif (isset($_POST['conf-modif']) || isset($_POST['conf-newE'])) {
                
                if(gettype($_POST['dateMod']) == 'array') {
                    $as = count($_POST['dateMod']);
                    $afm = [];
                    for ($i = 0; $i < $as; $i++) {
                        $debut = $this->formatDate($_POST['dateMod'][$i], $_POST['timeMod'][$i], $_POST['secMod'][$i]);
                        $fin = $this->formatDate($_POST['dateModfin'][$i], $_POST['timeModfin'][$i], $_POST['secModfin'][$i]);
                        $afm[$i]['id'] = $_POST['idEntree'][$i];
                        $afm[$i]['debut'] = $debut;
                        $afm[$i]['fin'] = $fin;
                        $afm[$i]['decompte'] = $this->calculDecompte($debut, $fin);
                    }
                    
                    if ($this->main_controller->getManager()->modifyMultipleFromId($afm)) {
                        $data['modifies'] = TRUE;
                    }
                    
                } else {
                    $debut = $this->formatDate($_POST['dateMod'], $_POST['timeMod'], $_POST['secMod']);
                    $fin = $this->formatDate($_POST['dateModfin'], $_POST['timeModfin'], $_POST['secModfin']);
                    $decompte = $this->calculDecompte($debut, $fin);

                    if (isset($_POST['conf-modif'])) {
                        if($this->main_controller->getManager()->modifyEntry($_POST['idEntree'], $debut, $fin, $decompte)) {
                            $data['modifie'] = TRUE;
                        }
                    } elseif (isset($_POST['conf-newE'])) {
                        if($this->main_controller->getManager()->newEntry($debut, $fin, $decompte)) {
                            $data['new-ins'] = TRUE;
                        }
                    }
                }
                $this->dataNorm($data);
                
            } elseif (isset($_POST['selectRows'])) {
                $data['selectedRows'] = $this->main_controller->getManager()->selectEntries($_POST['selectRowsOff'], $_POST['selectRows']);
                $data['nbSlc'] = count($data['selectedRows']);
                $data['offsetSH'] = $_POST['selectRowsOff']; //pour actualiser input caché
                $data['offsetNH'] = $_POST['selectRows'] + $_POST['selectRowsOff']; //pour actualiser input caché nextRows
                if (!$this->main_controller->getManager()->selectEntries($data['offsetNH'], 10)) { //si plus de résultats à afficher après ceux-là...
                    $data['noNext'] = TRUE; //le formulaire nextrows sera caché basé sur cette data
                }
            } elseif (isset ($_POST['nextRows'])) {
                $data['rowsNext'] = $this->main_controller->getManager()->selectEntries($_POST['nextRowsOff'], $_POST['nextRows']);
                $data['nbSlc'] = count($data['rowsNext']);
                $data['offsetSH'] = $_POST['nextRowsOff'];
                $data['offsetNH'] = $_POST['nextRows'] + $_POST['nextRowsOff'];
                if (!$this->main_controller->getManager()->selectEntries($data['offsetNH'], 10)) {
                    $data['noNext'] = TRUE;
                }
            } elseif (isset ($_POST['prevRows'])) {
                $offset = $_POST['prevRowsOff'] - $_POST['prevRows'];
                if ($offset < 0) {
                    $offset = 0;
                    $data['noPrev'] = TRUE;
                }
                $data['offsetSH'] = $offset;
                $data['offsetNH'] = $offset + $_POST['prevRows'];
                $data['rowsPrev'] = $this->main_controller->getManager()->selectEntries($offset, $_POST['prevRows']);
                $data['nbSlc'] = count($data['rowsPrev']);
            } elseif (isset($_POST['date-select'])) {
                $a_size = count($_POST['date-select']);
                if ($a_size > 1) {
                    $data['lignes_sld'] = $this->main_controller->getManager()->searchbyDates($_POST['date-select']);
                } else {
                    $data['lignes_sld'] = $this->main_controller->getManager()->searchbyDate($_POST['date-select'][0]);
                }
            } elseif (isset($_POST['dslrd'])) {
                $data['rowsDR'] = $this->main_controller->getManager()->getDateRange($_POST['dslrd'], $_POST['dslrf']);
            } elseif (isset($_POST['total'])) {
                $data['rowsTot'] = $this->main_controller->getManager()->selectEntriesFromId($_POST['select-entry']);
                $data['totDec'] = $this->totDec($data['rowsTot']);
            } elseif (isset($_POST['derl'])) {
                $data['rowsLast'] = $this->main_controller->getManager()->selectEntries(0, 10, false);
                $row_count = $this->main_controller->getManager()->countEntries()[0];
                $offset = $row_count - 10;
                $data['offsetSH'] = $offset;
                $data['noNext'] = TRUE;
                $data['noSlRows'] = TRUE;
                $data['nbSlc'] = count($data['rowsLast']);
            } elseif (empty($_POST) || isset($_POST['preml'])) { //page basique, aucun formulaire envoyé ou bouton premières lignes cliqué
                $this->dataNorm($data);
            }
        }
        
        $this->requireView($this->getPath(), $data);
    }
    
    private function formatDate($date, $temps, $secondes) {
        $date_f = $date . ' ' . $temps;
            if ($secondes == '0') {
                $secondes = ':0' . $secondes;
            } else {
                $secondes = ':' . $secondes;
            }
        $date_f .= $secondes;
        return $date_f;
    }
    
    private function calculDecompte($debut, $fin) {
        $ts_debut = $this->dToStamp($debut);
        $ts_fin = $this->dToStamp($fin);
        
        return $ts_fin - $ts_debut;
    }
    
    private function totDec(array $arr) {
        $total = 0;
        foreach ($arr as $k => $v) {
            $total += $v['decompte'];
        }
        return $total;
    }
    
    private function dToStamp($date) {
        $ts = mktime(substr($date, 11, 2), substr($date, 14,2), substr($date, 17,2), substr($date, 5, 2), substr($date, 8, 2), substr($date, 0, 4));
        return $ts;
    }
    
    private function dataNorm(array &$data) {
        $data['rowsNorm'] = $this->main_controller->getManager()->selectEntries(0, 10);
        if (!$this->main_controller->getManager()->selectEntries(10, 10)) {
            $data['noNext'] = TRUE;
        }
        $data['noPrev'] = TRUE;
    }
}