<?php
require_once 'include/Form.php';
require_once 'include/fonctions.php';

include 'vues/v_entete.php';

session_start();
$pdo = Form::getPdo();
$estConnecte = estConnecte();

if(!isset($_REQUEST['uc']) || !$estConnecte){
    $_REQUEST['uc'] = 'connexion';
}
$uc = $_REQUEST['uc'];
switch($uc){
    case 'connexion':{
            include 'controleurs/c_index.php';
            break;
    }
}

include 'vues/v_pied.php';
?>