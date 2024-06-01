<?php
// Supposez que vous ayez récupéré la liste des classes de votre base de données
$classes = ['Classe A', 'Classe B', 'Classe C']; // Exemple de liste de classes

// Affichage des classes
foreach ($classes as $classe) {
    echo '<a href="ajouter_absence.php?classe=' . urlencode($classe) . '">' . $classe . '</a><br>';
}
?>
