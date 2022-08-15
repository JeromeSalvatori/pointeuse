<?php

class Dao {
    
    private $_db;
    
    public function __construct($host, $db, $username, $password, $port = ''){
            if (!$port) {
               $db = new PDO("mysql:host=$host;dbname=$db", $username, $password); 
            } else {
                $db = new PDO("mysql:host=$host;port=$port;dbname=$db", $username, $password);
            }
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setDb($db);
    }
    
    private function setDb($db) {
        $this->_db = $db;
    }
    
    public function getDb() {
        return $this->_db;
    }
}

class Manager {
    private $_dao;
    
    public function __construct(Dao $dao) {
        $this->_dao = $dao;
    }
    
    private function prepareStringForMR($arr, $crit = 'id') {
        $string = "";
        $num_items = count($arr);
        $i = 0;
        $ki = 0;
        //prépare la chaîne de valeurs id ou autre à inclure dans la requête supprimer, select ou autre
        foreach ($arr as $key => $val) {
            $ki = $key + 1;
            if ($crit == 'date') {
                $string .= "debut LIKE CONCAT(:date$ki, '%')";
                if (++$i !== $num_items) {
                    $string .= " OR ";
                }
            } elseif ($crit == 'smd' || $crit == 'smf' || $crit == 'smde') {
                switch ($crit) {
                    case "smd":
                        $value = ":debut";
                        break;
                    case "smf":
                        $value = ":fin";
                        break;
                    case "smde":
                        $value = ":decompte";
                        break;
                }
                $string .= "WHEN :id$ki THEN $value$ki";
                if (++$i !== $num_items) {
                    $string .= " ";
                }
            } else {
                $string .= ":$crit$ki";
                if (++$i !== $num_items) {
                    $string .= ",";
                }
            }
        }
        return $string;
    }
    
    private function bindVAndExecForMR($arr, $stmt, $crit = 'id') {
        foreach ($arr as $key => $val) {
            $ki = $key + 1;
            if (gettype($val) == 'array') {
                foreach ($val as $k => $v) {
                    $stmt->bindValue(":$k$ki", $v);
                }
            } else {
               $stmt->bindValue(":$crit$ki", $val); 
            }
        }
        //return $stmt->execute();
        return $stmt;
    }
    
    public function newEntry($debut, $fin, $decompte) {
        $stmt = $this->_dao->getDb()->prepare("INSERT INTO heures (debut, fin, decompte) VALUES (:debut, :fin, :decompte)");
        $stmt->bindValue(':debut', $debut);
        $stmt->bindValue(':fin', $fin);
        $stmt->bindValue('decompte', $decompte);
        return $stmt->execute();
    }
    
    public function searchbyDate($date) {
        $stmt = $this->_dao->getDb()->prepare("SELECT * FROM heures WHERE debut LIKE CONCAT(:date, '%')");
        $stmt->bindValue(':date', $date);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function searchbyDates($array) {
        $string = $this->prepareStringForMR($array, 'date');
        //var_dump($string);
        $stmt = $this->_dao->getDb()->prepare("SELECT * FROM heures WHERE $string ORDER BY id");
        $this->bindVAndExecForMR($array, $stmt, 'date')->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getDateRange($d, $f) {
        $stmt = $this->_dao->getDb()->prepare("SELECT * FROM heures WHERE debut BETWEEN :d AND :f");
        $stmt->bindValue(':d', $d);
        $stmt->bindValue(':f', $f);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function selectEntry($id) {
        $stmt = $this->_dao->getDb()->prepare("SELECT * FROM heures WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function selectEntries($offset, $limit, $desc = true) {
        if (!$desc) {
            $stmt = $this->_dao->getDb()->prepare("SELECT * FROM heures ORDER BY id LIMIT :offset, :limit");
        } else {
            $stmt = $this->_dao->getDb()->prepare("SELECT * FROM heures ORDER BY id DESC LIMIT :offset, :limit");
        }
        
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function selectEntriesFromId(array $arr) {
        //var_dump($arr);
        $string = $this->prepareStringForMR($arr);
        $stmt = $this->_dao->getDb()->prepare("SELECT * FROM heures WHERE id IN ($string) ORDER by id DESC");
        $this->bindVAndExecForMR($arr, $stmt)->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function countEntries() {
        $sql = "SELECT COUNT(*) FROM heures";
        $stmt = $this->_dao->getDb()->query($sql);
        return $stmt->fetch(PDO::FETCH_NUM);
    }
    
    public function modifyEntry($id, $debut, $fin, $decompte) {
        $stmt = $this->_dao->getDb()->prepare("UPDATE heures SET debut = :debut, fin= :fin, decompte = :decompte WHERE id = :id");
        $stmt->bindValue(':debut', $debut);
        $stmt->bindValue(':fin', $fin);
        $stmt->bindValue(':decompte', $decompte);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
    
    public function modifyMultipleFromId(array $arr) {
        $smd = $this->prepareStringForMR($arr, 'smd');
        $smf = $this->prepareStringForMR($arr, 'smf');
        $smde = $this->prepareStringForMR($arr, 'smde');
        $smid = $this->prepareStringForMR($arr);
        $rs = "UPDATE heures SET debut = (CASE id $smd ELSE debut END), 
        fin = (CASE id $smf ELSE fin END), 
        decompte = (CASE id $smde ELSE fin END) WHERE id IN ($smid)";
        $stmt = $this->_dao->getDb()->prepare($rs);
        return $this->bindVAndExecForMR($arr, $stmt)->execute();
    }
    
    public function deleteFromId($id) {
        $stmt = $this->_dao->getDb()->prepare("DELETE FROM heures WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
    
    public function deleteMultipleFromId(array $arr) {
        $string = $this->prepareStringForMR($arr);
        $stmt = $this->_dao->getDb()->prepare("DELETE FROM heures WHERE id IN ($string)");
        return $this->bindVAndExecForMR($arr, $stmt)->execute();
    }
    
    public function insertToken($userId, $token) {
        $sql = "INSERT INTO login_token (admin_login_id, login_token) VALUES ($userId, '$token')";
        $this->_dao->getDb()->exec($sql);
    }
    
    public function getToken($userid) {
        $stmt = $this->_dao->getDb()->prepare("SELECT * FROM login_token WHERE admin_login_id = :userid");
        $stmt->bindValue(':userid', $userid);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deleteToken($userid) {
        $stmt = $this->_dao->getDb()->prepare("DELETE FROM login_token WHERE admin_login_id = :userid");
        $stmt->bindValue(':userid', $userid);
        $stmt->execute();
    }
    
    public function getUser($pseudo) {
        $stmt = $this->_dao->getDb()->prepare("SELECT * FROM admin_login where pseudo = :pseudo");
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

