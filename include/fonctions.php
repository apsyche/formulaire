<?php
function estConnecte(){
    return isset($_SESSION['id']);
}

function deconnecter(){
    session_destroy();
}

function ajouterMsg($msg){
   if (! isset($_REQUEST['msg'])){
      $_REQUEST['msg']=array();
	} 
   $_REQUEST['msg'][]=$msg;
}

function nbMsg(){
   if (!isset($_REQUEST['msg'])){
	   return 0;
	}
	else{
	   return count($_REQUEST['msg']);
	}
}