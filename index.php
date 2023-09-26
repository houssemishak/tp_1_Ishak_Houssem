<?php
$host = "localhost"; // Adresse du serveur de base de données MySQL
$db = "tp_1"; // Nom de la base de données
$user = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8"; // Chaîne de connexion PDO

try {
    $oPDO = new PDO($dsn, $user, $password); // Créer une instance de PDO pour la connexion à la base de données

    if ($oPDO) {
        echo "Connecté à la base de données $db avec succès !";
    }
} catch (PDOException $e) {
    echo $e->getMessage(); // En cas d'erreur de connexion, afficher le message d'erreur
}

require_once "class/Refrigerator.php"; // Inclure la classe Refrigerator depuis le fichier externe

$refrigerator = new Refrigerator; // Créer une instance de la classe Refrigerator
echo "<br>";
echo "<br>";

// Récupérer tous les réfrigérateurs
$refrigerators = $refrigerator->getAllRefrigerator();

// Affichage sous forme de tableau HTML
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Marque</th><th>Couleur</th><th>Prix</th></tr>";

foreach ($refrigerators as $refrigerator) {
    echo "<tr>";
    echo "<td>{$refrigerator['id']}</td>";
    echo "<td>{$refrigerator['marque']}</td>";
    echo "<td>{$refrigerator['couleur']}</td>";
    echo "<td>{$refrigerator['prix']}</td>";
    echo "</tr>";
}

echo "</table>";

$refrigerator = new Refrigerator; // Créer une nouvelle instance de la classe Refrigerator

$refrigerator_to_insert = [
    'marque' => "LG",
    'couleur' => "jaune",
    'prix' => 150,
];

$refrigerator_added = $refrigerator->addRefrigerator($refrigerator_to_insert);

$refrigerator1 = new Refrigerator; // Créer une autre instance de la classe Refrigerator

$refrigerator = $refrigerator1->getRefrigeratorById(1); // Obtenir le réfrigérateur avec l'identifiant 1

$refrigerator['marque'] = "Toshiba";
$refrigerator['couleur'] = "bleu";
$refrigerator['prix'] = 200;

$refrigerator1->UpdateRefrigerator($refrigerator['id'], $refrigerator);

// Obtenir le réfrigérateur avec l'identifiant 1 après la mise à jour
var_dump($refrigerator1->getRefrigeratorById(1));

$refrigerator1->deleteRefrigerator(10);
?>

