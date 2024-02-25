<!-- vues/users/U_index.php -->
<main>
    <h1>Créer un utilisateurs</h1>
    <!-- Formulaire pour créer un nouvel utilisateur -->
    <form action="index.php?url=users" method="POST">
        <label for="nom">Nom  :</label></br>
        <input type="text" id="nom" name="nom" required> </br>
        <label for="prenom">prenom :</label></br>
        <input type="text" id="prenom" name="prenom" required></br>
        <label for="username">Nom d'utilisateur :</label></br>
        <input type="text" id="username" name="username" required></br>
        <label for="password">Mot de passe :</label></br>
        <input type="password" id="password" name="password" required>
        <!-- autorisation pour les pages Analytics-->
        <h3>Droits sur les pages Analytics:</h3>
        <input type="checkbox" name="permissions[recapitulatif]" value="1"> Récapitulatif<br>
        <input type="checkbox" name="permissions[journalDesVisites]" value="1"> Journal des visites<br>
        <input type="checkbox" name="permissions[enTempsReel]" value="1"> En temps réel<br>
        <input type="checkbox" name="permissions[provenances]" value="1"> Géolocalisation<br>
        <input type="checkbox" name="permissions[provenances]" value="1"> Provenances géographiques<br>
        <input type="checkbox" name="permissions[peripherique]" value="1"> Périphérique<br>
        <input type="checkbox" name="permissions[logiciel]" value="1"> Logiciel<br>
        <input type="checkbox" name="permissions[horaires]" value="1"> Horaires<br>
        <!-- autorisation pour les pages du site -->
        <!-- <h3>Droit de consulter les pages:</h3>
        <label for="visites">des visites :</label>
        <input type="checkbox" id="visites" name="visites" value="1">
        <label for="comportement">des Comportement :</label>
        <input type="checkbox" id="comportement" name="comportement" value="1">
        <label for="tableauBord">du Tableau de bord :</label>
        <input type="checkbox" id="tableauBord" name="tableauBord" value="1"><br> -->
        <button type="submit">Créer Utilisateur</button></br></br></br></br>
    </form>
</main>