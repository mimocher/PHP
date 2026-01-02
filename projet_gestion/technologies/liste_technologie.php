<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");

$technoo = $pdo->query("
    SELECT t.*, COUNT(pt.projet_id) as nb_projets
    FROM technologies t
    LEFT JOIN projet_technologie pt ON t.id = pt.technologie_id
    GROUP BY t.id")->fetchAll();
?>

<h2>Liste des Technologies</h2>

<a href="ajout_technologie.php">Ajouter une technologie</a><br><br>

<table border="1">
    <tr>
        <th>Nom</th>
        <th>Nombre de projets</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($technoo as $t): ?>
    <tr>
        <td><?php echo $t['nom']; ?></td>
        <td><?php echo $t['nb_projets']; ?></td>
        <td>
            <a href="details_technologie.php?id=<?php echo $t['id']; ?>">Détails</a> | 
            <a href="modifier_technologie.php?id=<?php echo $t['id']; ?>">Modifier</a> | 
            <a href="supprimer_technologie.php?id=<?php echo $t['id']; ?>" onclick="return confirm('Supprimer?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="../index.php">Retour à l'accueil</a>
