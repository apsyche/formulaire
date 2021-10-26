<?php
$pdo = Form::getPdo();
//$estConnecte = estConnecte();
if(!isset($_REQUEST['action'])){
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
    case 'demandeConnexion':{
        include("vues/v_connexion.php");
        break;
    }
    case 'valideConnexion':{
        $login = $_REQUEST['login'];        
        $mdp = $_REQUEST['mdp'];       
        $utilisateur = $pdo->verifConnexion($login,$mdp);
       
        if(!is_array($utilisateur)){
            ajouterMsg("Erreur. Recommencer");
            include 'vues/v_msg.php';
            include 'vues/v_connexion.php';
            break;
        }
        else{
            ajouterMsg("Ok");
            include 'vues/v_msg.php';
            include 'vues/v_connexion.php';
            break;
        }
        
    }
    case 'inscription' :{
        include 'vues/v_inscription.php';break;
    }
    case 'valideInscription':{
        $login = $_REQUEST['login'];
        $mdp = $_REQUEST['mdp'];
        $select = $pdo->verifDonnees($login);
        $p = $select['login'];
        if(empty($_POST['login']) || empty($_POST['mdp'])){
            ajouterMsg("Champs vide");
            include 'vues/v_msg.php';
            include 'vues/v_inscription.php';
            break;
        }
        else if($login == $p){
            ajouterMsg("Identifiant djà utilisé");
            include 'vues/v_msg.php';
            include 'vues/v_inscription.php';
            break;
        }
        else if($login != $p){
        $pdo->insertUtilisateur($login,$mdp);
        ajouterMsg("Identifiant crée");
        include 'vues/v_msg.php';
        include 'vues/v_connexion.php';
        break;
        }
        
    }
}
?>