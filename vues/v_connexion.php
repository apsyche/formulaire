 <div id="contenu">
    <h1>Connexion</h1>
    <form method="post" action="index.php?uc=connexion&action=valideConnexion" id="connexion">
            <label for="login">Login</label> 
            <input id="login" type="text" name="login" size="30" maxlength="45" placeholder="Entrer votre login...">
            <br>
            <label for="mdp">Mot de passe</label>
            <input id="mdp" type="password" name="mdp" size="30" maxlength="45" placeholder="Entrer votre mot de passe...">
            <br>
            <input type="submit" value="Valider" name="valider">
            <input type="reset" value="Reset" name="reset">
    </form>
    <a href="index.php?uc=connexion&action=inscription"><input type="button" value="Ajouter un compte" name="ajout"></a>
</div>
</body>
</html>