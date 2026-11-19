<?php
/**
 * Paramètres de connexion à la base de données (FOURNI).
 * Valeurs par défaut de MySQL sous XAMPP / WAMP :
 *   hôte "localhost", port 3306, utilisateur "root", mot de passe vide.
 *
 * Si vous utilisez MAMP : DB_PASS = 'root' et DB_PORT = '8889'.
 */
const DB_HOST    = '127.0.0.1'; //car si on ecrire localhost macos ignore la valuer de DB_PORT et utilise le port par defaut 3306
//pour ce la je suis donne l'adresse IP pour obliger de verifier le port si suffisant pour la connexion a la base de donnee
//const DB_HOST    = 'localhost'; 

const DB_PORT    = '3306';
const DB_NAME    = 'gestion_etudiants';
const DB_USER    = 'root';
const DB_PASS    = '';
const DB_CHARSET = 'utf8mb4';

/** Liste des filières proposées dans le formulaire */
const FILIERES = ['Informatique', 'Mathématiques', 'Physique', 'Chimie', 'Biologie'];



$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // erreurs levées en PDOException
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // $ligne['nom'] au lieu de $ligne[2]
    PDO::ATTR_EMULATE_PREPARES   => false,                  // vraies requêtes préparées côté MySQL
];

try {
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}