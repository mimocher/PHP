<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");
$id = $_GET['id'];
if ($_POST && $_POST['confirmer'] == 'oui') {
    $pdo->query("DELETE FROM developpeurs WHERE id = $id");
    echo "supprime avec success!<br>";
    echo "<a href='liste_developpeurs.php'>Retour à la liste</a>";
    exit;
}
?>
<h2>Supprimer Dev</h2>
<p>vs etes sur le le supprimer?</p>
<form method="POST">
    <input type="hidden" name="confirmer" value="oui">
    <input type="submit" value="Oui supprimer">
    <a href="liste_developpeurs.php">Non, annuler</a>
</form>