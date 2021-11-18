<?php

    class Form{
        private static $serveur='mysql:host=localhost';
        private static $bdd='dbname=form';
        private static $user='root' ;
        private static $mdp='' ;
        private static $monPdo;
        private static $monPdoForm=null;
        
        private function __construct(){
            Form::$monPdo = new PDO(Form::$serveur.';'.Form::$bdd, Form::$user, Form::$mdp);
            Form::$monPdo->query("SET CHARACTER SET utf8");
        }
        public function _destruct(){
            Pdo::$monPdo = null;
        }
        
        public static function getPdo(){
            if(Form::$monPdoForm==null){
                Form::$monPdoForm= new Form();
            }
            return Form::$monPdoForm;
        }
        
        public function verifConnexion($login, $mdp){
            $req = "select * from utilisateur where utilisateur.identifiant=:login and utilisateur.mdp=:mdp";
            /*$rs = Form::$monPdo->query($req);
            $ligne = $rs->fetch();
            return $ligne;
             * */
            
            $rs = Form::$monPdo->prepare($req);
            $rs->bindParam(':login',$login);
            $rs->bindParam(':mdp',$mdp);
            $rs->execute();
            $ligne = $rs->fetch();
            return $ligne;
        }
        
        public function insertUtilisateur($login,$mdp) {
            $req = "insert into utilisateur values('','$login','$mdp')";
            Form::$monPdo->exec($req);
        }
        
      public function verifDonnees($login){
            $req = "select utilisateur.identifiant from utilisateur where utilisateur.identifiant=:login";
            /*$rs = Form::$monPdo->query($req);
            $ligne = $rs->fetch();
            return $ligne;
            */
            $rs = Form::$monPdo->prepare($req);
            $rs->bindParam(':login',$login);
            $rs->execute();
            $ligne = $rs->fetch();
            return $ligne;
        }
        
    }

?>