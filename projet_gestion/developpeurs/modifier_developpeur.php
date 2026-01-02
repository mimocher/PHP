<?php
$host = "localhost";
$dbname = "gestion_projets";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch(Exception $e) {
    die("hnaya erreur");
}

$id = $_GET['id'];
$sql = "SELECT * FROM developpeurs WHERE id = $id";
$resultatt = $pdo->query($sql);
$dev = $resultatt->fetch();
if ($_POST) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $specialite = $_POST['specialite'];
    
    $sql = "UPDATE developpeurs SET 
            nom = '$nom', 
            email = '$email', 
            specialite = '$specialite' 
            WHERE id = $id";
    
    if ($pdo->query($sql)) {
        echo "Développeur modifié!<br>";
    }
    
    $resultatt = $pdo->query("SELECT * FROM developpeurs WHERE id = $id");
    $dev = $resultatt->fetch();
}
?>
<h2>modifier dev</h2>

<form method="POST">
    Nom: <input type="text" name="nom" value="<?php echo $dev['nom']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $dev['email']; ?>" required><br><br>
    Spec: <input type="text" name="specialite" value="<?php echo $dev['specialite']; ?>"><br><br>
    <input type="submit" value="Modifier">
</form>
<a href="liste_developpeurs.php">Retour à la liste</a>