<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");
$technologies = $pdo->query("SELECT id, nom FROM technologies")->fetchAll();

if ($_POST) {
    $pdo->query("INSERT INTO projets (titre, type_projet, description) 
                 VALUES ('{$_POST['titre']}', '{$_POST['type_projet']}', '{$_POST['description']}')");
    
    echo "Projet ajoute!<br>";
}
?>

<h2>Ajouter un Projet</h2>

<form method="POST">
    <p>
        <label>Titre </label><br>
        <input type="text" name="titre" required>
    </p>

    <p>
        <label>Type </label><br>
        <input type="text" name="type_projet" required>
    </p>
    
    <p>
        <label>Date deb</label><br>
        <input type="date" name="date_debut">
    </p>
    
    <p>
        <label>Date fin</label><br>
        <input type="date" name="date_fin">
    </p>
    
    <p>
        <label>Description</label><br>
        <textarea name="description" rows="4"></textarea>
    </p>
    
    <p>
        <label>Technologies utilisees</label><br>
        <?php foreach ($technologies as $tech): ?>
            <input type="checkbox" name="technologies[]" value="<?php echo $tech['id']; ?>">
            <?php echo $tech['nom']; ?><br>
        <?php endforeach; ?>
    </p>
    
    <p>
        <input type="submit" value="Enregistrer">
        <a href="liste_projets.php">Annuler</a>
    </p>
</form>