<?php
// Inclure le fichier "Crud.php" qui définit l'interface Crud.
require_once('Crud.php');

// La classe Refrigerator implémente l'interface Crud.
class Refrigerator implements Crud {

    // Méthode pour obtenir tous les réfrigérateurs.
    public function getAllRefrigerator() {
        global $oPDO; // Utilisation de la variable globale $oPDO (PDO).

        // Prépare une requête SQL pour sélectionner tous les réfrigérateurs, triés par ID.
        $oPDOStatement = $oPDO->query("SELECT id, marque, couleur, prix FROM réfrigérateur ORDER BY id ASC");

        // Récupère tous les réfrigérateurs sous forme d'un tableau associatif.
        $refrigerators = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $refrigerators;
    }

    // Méthode pour obtenir un réfrigérateur par son ID.
    public function getRefrigeratorById($id) {
        global $oPDO; // Utilisation de la variable globale $oPDO (PDO).

        // Prépare une requête SQL pour sélectionner un réfrigérateur par son ID.
        $oPDOStatement = $oPDO->prepare('SELECT id, marque, couleur, prix FROM réfrigérateur WHERE id=:id');

        // Lie la valeur de l'ID en tant que paramètre.
        $oPDOStatement->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécute la requête.
        $oPDOStatement->execute();

        // Récupère le réfrigérateur en tant que tableau associatif.
        $refrigerator = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
        return $refrigerator;
    }

    // Méthode pour ajouter un réfrigérateur.
    public function addRefrigerator($data) {
        global $oPDO; // Utilisation de la variable globale $oPDO (PDO).

        // Prépare une requête SQL pour insérer un nouveau réfrigérateur avec les données fournies.
        $oPDOStmt = $oPDO->prepare('INSERT INTO réfrigérateur SET marque=:marque, couleur=:couleur, prix=:prix;');

        // Lie les données fournies en tant que paramètres.
        $oPDOStmt->bindParam(':marque', $data['marque'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':couleur', $data['couleur'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':prix', $data['prix'], PDO::PARAM_INT);

        // Exécute la requête.
        $oPDOStmt->execute();

        // Vérifie le nombre de lignes affectées.
        if ($oPDOStmt->rowCount() <= 0) {
            return false;
        }

        // Retourne l'ID du dernier élément inséré.
        return $oPDO->lastInsertId();
    }

    // Méthode pour mettre à jour un réfrigérateur.
    public function updateRefrigerator($id, $data) {
        global $oPDO; // Utilisation de la variable globale $oPDO (PDO).

        // Prépare une requête SQL pour mettre à jour un réfrigérateur avec les nouvelles données.
        $oPDOStmt = $oPDO->prepare('UPDATE réfrigérateur SET marque=:marque, couleur=:couleur, prix=:prix WHERE id=:id ;');

        // Lie les nouvelles données en tant que paramètres.
        $oPDOStmt->bindParam(':marque', $data['marque'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':couleur', $data['couleur'], PDO::PARAM_STR);
        $oPDOStmt->bindParam(':prix', $data['prix'], PDO::PARAM_INT);
        $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécute la requête.
        $oPDOStmt->execute();

        return $oPDOStmt;
    }

    // Méthode pour supprimer un réfrigérateur par son ID.
    public function deleteRefrigerator($id) {
        // Obtient les détails du réfrigérateur par son ID.
        $refrigerator = $this->getRefrigeratorById($id);

        if($refrigerator){
            global $oPDO; // Utilisation de la variable globale $oPDO (PDO).

            // Prépare une requête SQL pour supprimer le réfrigérateur avec l'ID spécifié.
            $oPDOStmt = $oPDO->prepare('DELETE FROM réfrigérateur WHERE id=:id ;');

            // Lie l'ID en tant que paramètre.
            $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Exécute la requête de suppression.
            $result = $oPDOStmt->execute();

            return "Le réfrigérateur avec l'ID ".$refrigerator['id']." a été supprimé.<br>";
        }
        else{
            return "Réfrigérateur introuvable.";
        }
    }
}
?>
