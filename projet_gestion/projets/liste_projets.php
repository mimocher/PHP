<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");

$projets = $pdo->query("
    SELECT p.*, COUNT(a.id) as nb_developpeurs
    FROM projets p
    LEFT JOIN affections a ON p.id = a.projet_id
    GROUP BY p.id
")->fetchAll();
?>

<h2>Liste des Projets</h2>

<a href="ajout_projet.php">Ajouter un projet</a><br><br>

<table border="1">
    <tr>
        <th>Titre</th>
        <th>Type</th>
        <th>Statut</th>
        <th>Date fin</th>
        <th>Nb développeurs</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($projets as $p): ?>
    <tr>
        <td><?php echo $p['titre']; ?></td>
        <td><?php echo $p['type_projet']; ?></td>
        <td><?php echo $p['statut']; ?></td>
        <td><?php echo $p['date_fin']; ?></td>
        <td><?php echo $p['nb_developpeurs']; ?></td>
        <td>
            <a href="details_projet.php?id=<?php echo $p['id']; ?>">Détails</a> | 
            <a href="modifier_projet.php?id=<?php echo $p['id']; ?>">Modifier</a> | 
            <a href="supprimer_projet.php?id=<?php echo $p['id']; ?>" onclick="return confirm('Supprimer?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="../index.php">Accueil</a>