<?php
// Définition de l'interface CRUD (Create, Read, Update, Delete) en PHP

interface Crud {
    // Méthode pour récupérer tous les réfrigérateurs
    public function getAllRefrigerator();

    // Méthode pour récupérer un réfrigérateur par son identifiant
    public function getRefrigeratorById($id);

    // Méthode pour ajouter un nouveau réfrigérateur
    public function addRefrigerator($data);

    // Méthode pour mettre à jour les informations d'un réfrigérateur
    public function updateRefrigerator($id, $data);

    // Méthode pour supprimer un réfrigérateur par son identifiant
    public function deleteRefrigerator($id);
}
?>
