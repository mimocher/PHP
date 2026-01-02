<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");
$id = $_GET['id'];
$tech = $pdo->query("SELECT * FROM technologies WHERE id = $id")->fetch();

$projets = $pdo->query("
    SELECT p.titre, p.statut 
    FROM projets p
    JOIN projet_technologie pt ON p.id = pt.projet_id
    WHERE pt.technologie_id = $id
")->fetchAll();
?>

<h2>Détails de la Technologie</h2>

<p><strong>Nom:</strong> <?php echo $tech['nom']; ?></p>
<p><strong>Description:</strong> <?php echo $tech['description']; ?></p>

<h3>Projets utilisant cette technologie</h3>
<?php if ($projets): ?>
    <ul>
        <?php foreach ($projets as $p): ?>
        <li><?php echo $p['titre']; ?> (<?php echo $p['statut']; ?>)</li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>pas de projet qui utilise cette techno</p>
<?php endif; ?>

<br>
<a href="liste_technologie.php">Retour</a> | 
<a href="modifier_technologie.php?id=<?php echo $id; ?>">Modifier</a> | 
<a href="supprimer_technologie.php?id=<?php echo $id; ?>" onclick="return confirm('Supprimer?')">Supprimer</a>