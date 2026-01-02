<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");
     $id = $_GET['id'];
   $dev = $pdo->query("SELECT * FROM developpeurs WHERE id = $id")->fetch();
?>
    <h2>details de developpeur</h2>
     <strong>Nom:</strong> <?php echo $dev['nom']; ?></p>
<p><strong>Email:</strong> <?php echo $dev['email']; ?></p>
<p><strong>Specialite:</strong> <?php echo $dev['specialite']; ?></p>
<p><strong>Date:</strong> <?php echo $dev['date_creation']; ?></p>
<h3>Projets</h3>
<?php
        $projets = $pdo->query("
    SELECT p.titre, p.statut, a.role 
       FROM affections a 
    JOIN projets p ON a.projet_id = p.id 
    WHERE a.developpeur_id = $id
")->fetchAll();

if ($projets) { foreach ($projets as $p) {      echo $p['titre'] . " - " . $p['statut'] . " (" . $p['role'] . ")<br>";  }
} else { echo "Aucun projet";}
?>
<br>
<a href="liste_developpeurs.php">Retour</a>
<a href="modifier_developpeur.php?id=<?php echo $id; ?>">Modifier</a>