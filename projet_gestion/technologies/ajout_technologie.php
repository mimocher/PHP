<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");

if ($_POST) {
    $sql = "INSERT INTO technologies (nom, description) VALUES ('{$_POST['nom']}', '{$_POST['description']}')";
    if ($pdo->query($sql)) {
        echo "Technologie ajoutee!<br>";
    }
}
?>

<h2>Ajouter une Technologie</h2>

<form method="POST">
    <p>
        <label>Nom *</label><br>
        <input type="text" name="nom" required>
    </p>
    
    <p>
        <label>Description</label><br>
        <textarea name="description" rows="4"></textarea>
    </p>
    
    <p>
        <input type="submit" value="Enregistrer">
        <a href="liste_technologie.php">Annuler</a>
    </p>
</form>