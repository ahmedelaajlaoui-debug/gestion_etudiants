<?php
/**
 * BONUS 5.2 : suppression d'un étudiant.
 * Reçoit l'id en POST, exécute un DELETE préparé, puis redirige vers la liste.
 *
 * >>> À COMPLÉTER <<<
 */
require_once __DIR__ . '/config/connexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: liste.php');
    exit;
}

// (fourni) récupération et validation de l'id : entier ou false
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $pdo = getConnexion();

    // TODO 5.2.a : préparer la requête DELETE ... WHERE id = :id
    $stmt = $pdo->prepare('DELETE FROM etudiants WHERE id = :id');

    // TODO 5.2.b : lier :id avec bindValue() en précisant PDO::PARAM_INT, puis exécuter
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // TODO 5.2.c : si rowCount() vaut 1, rediriger vers liste.php?supprime=1
    if ($stmt->rowCount() === 1) {
        header('Location: liste.php?supprime=1');
        exit;
    }
}

header('Location: liste.php');
exit;