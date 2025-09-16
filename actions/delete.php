<?php
session_start();
require_once('../database/Database.php');
require_once('../src/Task.php');

$db = Database::getInstance()->getConnection();
$taskManager = new Task($db);

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $taskManager->deleteTask($id);
}

header('Location: ../public/index.php');
exit;