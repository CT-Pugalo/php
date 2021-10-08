<?php
include("include.php");
if (!Users::estConnecter()) {
    header("Location: index.php");
}
?>
<form method="post" action="nouvelleNews.php">
    <input type="hidden" name="idu" value="<?php echo $_SESSION['utilisateur']['id'] ?>"/>
    <label>
        Titre
        <input name="Titre" type="text" placeholder="Titre">
    </label>
    <label>
        Contenu
        <textarea name="Contenu"></textarea>
    </label>
    <label>
        Date
        <input name="Date" type="date" placeholder="Titre">
    </label>
    <button type="submit">Envoyer</button>
</form>
