<!DOCTYPE html>
<html>
  <head>
    <title>Formulaire de commande</title>
  </head>
  <body>
    <h1>Formulaire de commande</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required><br><br>
      <label for="adresse">Adresse :</label>
      <textarea name="adresse" id="adresse" required></textarea><br><br>
      <label for="produit">Produit :</label>
     <input type="text" name="produit" id="produit" required><br><br>
      <label for="prix">Prix :</label>
      <input type="number" name="prix" id="prix" required><br><br>
      <input type="submit" value="Envoyer">
    </form>
  </body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['produit']) && isset($_POST['prix'])) {

        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $produit = $_POST['produit'];
        $prix = $_POST['prix'];

        $contenu = "$nom $adresse $produit $prix\n";
        $cheminFichier = "fichier_1.txt";

        if (file_put_contents($cheminFichier, $contenu, FILE_APPEND) !== false) {
            $destination = "C:\\Users\\yasmi\\OneDrive\\Bureau\\Baba\\donnees.txt";

            if (copy($cheminFichier, $destination)) {
                echo "Réussi";
            } else {
                echo "Erreur lors de la copie du fichier.";
            }
        } else {
            echo "Erreur lors de l'écriture dans le fichier";
        }
    }
}
?>
