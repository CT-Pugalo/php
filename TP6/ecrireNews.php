<?php
include("include.php");
if (!Users::estConnecter()) {
    header("Location: index.php");
}
?>
<form method="post" action="nouvelleNews.php">
    <input type="hidden" name="idu" value="<?php echo $_SESSION['utilisateur']->getId() ?>">
    <label>
        Titre
        <input name="Titre" type="text" placeholder="Titre">
    </label>
    <label>
        Contenu
        <textarea name="Contenu"></textarea>
    </label>
    <input name="Date" type="hidden" value=" <?php echo date("Y-m-d") ?> ">
    <button type="submit">Envoyer</button>
</form>
