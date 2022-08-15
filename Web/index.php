<?php

$c_files = glob('../Controle/*.php');
foreach ($c_files as $file) {
    require $file;
}
require '../Modele/Modele.php';
require '../lib/JFram/http.php';

try {
    $dao = new Dao('localhost', 'enregistrement_heures', 'root', '', '3308');
} catch (PDOException $e) {
    $data = [];
    $data['erreur'] = $e->getMessage();
    require '../Vues/vue_erreur.php';
    exit();
}

$manager = new Manager($dao);
$ho = new HTTPops($manager);
$mc = new MainController($manager, $ho);
$mc->pickController();
$mc->getController()->launch();
