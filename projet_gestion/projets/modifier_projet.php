<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");

$id = $_GET['id'];
$projet = $pdo->query("SELECT * FROM projets WHERE id = $id")->fetch();

if ($_POST) {
    $sql = "UPDATE projets SET 
            titre = '{$_POST['titre']}', 
            type_projet = '{$_POST['type_projet']}', 
            date_debut = '{$_POST['date_debut']}', 
            date_fin = '{$_POST['date_fin']}', 
            description = '{$_POST['description']}' 
            WHERE id = $id";
    
    if ($pdo->query($sql)) {
        echo "Modifie!<br>";
        $projet = $pdo->query("SELECT * FROM projets WHERE id = $id")->fetch();
    }
}
?>

<h2>Modifier le Projet</h2>

<form method="POST">
    <p>
        <label>Titre </label><br>
        <input type="text" name="titre" value="<?php echo $projet['titre']; ?>" required>
    </p>
    
    <p>
        <label>Type </label><br>
        <input type="text" name="type_projet" value="<?php echo $projet['type_projet']; ?>" required>
    </p>
    
    <p>
        <label>Date deb</label><br>
        <input type="date" name="date_debut" value="<?php echo $projet['date_debut']; ?>">
    </p>
    
    <p>
        <label>Date fin</label><br>
        <input type="date" name="date_fin" value="<?php echo $projet['date_fin']; ?>">
    </p>
    
    <p>
        <label>Description</label><br>
        <textarea name="description" rows="4"><?php echo $projet['description']; ?></textarea>
    </p>
    
    <p>
        <input type="submit" value="Modifier">
        <a href="details_projet.php?id=<?php echo $id; ?>">Annuler</a>
    </p>
</form>