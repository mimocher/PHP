<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");
$id = $_GET['id'];
$projet = $pdo->query("SELECT * FROM projets WHERE id = $id")->fetch();
         $developpeurs = $pdo->query("
    SELECT d.nom, a.role, a.date_affectation 
    FROM affections a
    JOIN developpeurs d ON a.developpeur_id = d.id
    WHERE a.projet_id = $id
")->fetchAll();
                $technologies = $pdo->query("
        SELECT t.nom 
    FROM technologies t
    JOIN projet_technologie pt ON t.id = pt.technologie_id
    WHERE pt.projet_id = $id
")->fetchAll();
?>

<h2>les details d un projet</h2>

<p><strong>Titre:</strong> <?php echo $projet['titre']; ?></p>
<p><strong>Type:</strong> <?php echo $projet['type_projet']; ?></p>
<p><strong>Statut:</strong> <?php echo $projet['statut']; ?></p>
<p><strong>Date ddeb:</strong> <?php echo $projet['date_debut']; ?></p>
<p><strong>Date fin:</strong> <?php echo $projet['date_fin']; ?></p>
<p><strong>Description:</strong> <?php echo $projet['description']; ?></p>

<h3>Technologies utilisees</h3>
<?php if ($technologies): ?>
    <ul>
        <?php foreach ($technologies as $t): ?>
        <li><?php echo $t['nom']; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucune technologie</p>
<?php endif; ?>

<h3>DLes devs affectes</h3>
<?php if ($developpeurs): ?>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Rôle</th>
            <th>Date affectation</th>
        </tr>
        <?php foreach ($developpeurs as $d): ?>
        <tr>
            <td><?php echo $d['nom']; ?></td>
            <td><?php echo $d['role']; ?></td>
            <td><?php echo $d['date_affectation']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Aucun ddev est affectee</p>
<?php endif; ?>

<br>
<a href="liste_projets.php">Retour</a> | 
<a href="modifier_projet.php?id=<?php echo $id; ?>">Modifier</a> | 
<a href="supprimer_projet.php?id=<?php echo $id; ?>" onclick="return confirm('Supprimer?')">Supprimer</a>