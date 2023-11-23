<?php
require 'connexion.php';

if (isset($_GET['panne_ref'])) {
    $panne_ref = $_GET['panne_ref'];

    // Perform the deletion
    $req = "DELETE FROM pannes WHERE panne_ref = '$panne_ref'";
    $query = mysqli_query($con, $req);

    if ($query) {
        echo "<h1 class='bg-info p-2'>Suppression réussie</h1>";
    } else {
        echo "<h1 class='bg-secondary p-2'>Erreur lors de la suppression</h1>";
    }
} else {
    echo "<h1 class='bg-secondary p-2'>Paramètre manquant</h1>";
}
?>
