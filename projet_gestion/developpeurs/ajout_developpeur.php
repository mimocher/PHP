<?php
$pdo = new PDO("mysql:host=localhost;dbname=gestion_projets", "root", "");

          $projets = $pdo->query("SELECT id, titre FROM projets")->fetchAll();

if ($_POST) {
    $pdo->query("INSERT INTO developpeurs (nom, email, mot_de_passe, specialite, image) 
                 VALUES ('{$_POST['nom']}', '{$_POST['email']}', '{$_POST['mot_de_passe']}', 
                         '{$_POST['specialite']}', '{$_POST['image']}')");
    
    echo "Le developpeur est ajoute!<br>";
}
?>


<h2>Ajouter un Dev</h2>

<form method="POST">
    
    <p>
        <label>Nom </label><br>
        <input type="text" name="nom" required>
    </p>
    <p>
        <label>Email </label><br>
        <input type="email" name="email" required>
    </p>
    
   
    <p>
        <label>Mot de passe </label><br>
        <input type="password" name="mot_de_passe" required>
    </p>
    
    <p>
        <label>Spec</label><br>
        <input type="text" name="specialite">
    </p>

    <p>
        <label>Image (URL)</label><br>
        <input type="file" name="image" >
    </p>
    
    <p>
        <label>Projet</label><br>
        <select name="projet_id">
            <option value="">selectionne un prj</option>
            <?php foreach ($projets as $projet): ?>
                <option value="<?php echo $projet['id']; ?>">
                    <?php echo $projet['titre']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label>Role dans le projet</label><br>
        <input type="text" name="role">
    </p>
    <p>
        <input type="submit" value="Enregistrer">
        <a href="liste_developpeurs.php">Annuler</a>
    </p>
</form>