<?php
require_once __DIR__ . '/../config/database.php';

$query = "
    SELECT d.*, COUNT(a.id) as nb_projets 
    FROM developpeurs d 
    LEFT JOIN affections a ON d.id = a.developpeur_id 
    GROUP BY d.id 
    ORDER BY d.nom
";
$stmt = $pdo->prepare($query);
$stmt->execute();
$developpeurs = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h1>La liste des devs</h1>
    
    <p><a href="ajout_developpeur.php">Ajouter un nouveau développeur</a></p>
    
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Spécialité</th>
            <th>Nombre de projets</th>
            <th>Actions</th>
        </tr>
        <?php if(count($developpeurs) > 0): ?>
            <?php foreach($developpeurs as $dev): ?>
            <tr>
                <td><?php echo htmlspecialchars($dev['nom']); ?></td>
                <td><?php echo htmlspecialchars($dev['email']); ?></td>
                <td><?php echo htmlspecialchars($dev['specialite']); ?></td>
                <td><?php echo $dev['nb_projets']; ?></td>
                <td>
                    <a href="details_developpeur.php?id=<?php echo $dev['id']; ?>">Détails</a> | 
                    <a href="modifier_developpeur.php?id=<?php echo $dev['id']; ?>">Modifier</a> | 
                    <a href="supprimer_developpeur.php?id=<?php echo $dev['id']; ?>" 
                       onclick="return confirm('Êtes-vous sûr?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun développeur trouvé</td>
            </tr>
        <?php endif; ?>
    </table>
    <p><a href="../index.php">Retour à l'accueil</a></p>
</body>
</html>