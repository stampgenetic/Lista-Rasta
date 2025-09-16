<?php
session_start();
require_once('../database/Database.php');
require_once('../src/Task.php');

$db = Database::getInstance()->getConnection();
$taskManager = new Task($db);

$description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
$difficultyId = filter_input(INPUT_POST, 'difficulty_id', FILTER_VALIDATE_INT);

if ($description && $difficultyId) {
    $taskManager->createTask($description, $difficultyId);
}

header('Location: ../public/index.php');
exit;