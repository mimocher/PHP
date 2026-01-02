<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");

$id = $_GET['id'];

if ($_POST && $_POST['confirmer'] == 'oui') {
    $pdo->query("DELETE FROM technologies WHERE id = $id");
    echo "Supprimee!<br>";
    echo "<a href='liste_technologie.php'>Retour à la liste</a>";
    exit;
}
?>
<h2>Supprimer la techno</h2>

<p>voulez vous la supprimer ?</p>

<form method="POST">
    <input type="hidden" name="confirmer" value="oui">
    <input type="submit" value="Oui, supprimer">
    <a href="liste_technologie.php">Non, annuler</a>
</form>