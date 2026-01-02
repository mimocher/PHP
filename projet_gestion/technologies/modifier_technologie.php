<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");

$id = $_GET['id'];
$tech = $pdo->query("SELECT * FROM technologies WHERE id = $id")->fetch();

if ($_POST) {
    $sql = "UPDATE technologies SET nom = '{$_POST['nom']}', description = '{$_POST['description']}' WHERE id = $id";
    if ($pdo->query($sql)) {
        echo "Modifiée!<br>";
        $tech = $pdo->query("SELECT * FROM technologies WHERE id = $id")->fetch();
    }
}
?>
<h2>Modifier la Technologie</h2>

<form method="POST">
    <p>
        <label>Nom *</label><br>
        <input type="text" name="nom" value="<?php echo $tech['nom']; ?>" required>
    </p>
    
    <p>
        <label>Description</label><br>
        <textarea name="description" rows="4"><?php echo $tech['description']; ?></textarea>
    </p>
    
    <p>
        <input type="submit" value="Modifier">
        <a href="details_technologie.php?id=<?php echo $id; ?>">Annuler</a>
    </p>
</form>