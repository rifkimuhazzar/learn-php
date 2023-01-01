<?php

require_once "Entity/Todolist.php";
require_once "Helper/InputHelper.php";
require_once "Repository/TodolistRepository.php";
require_once __DIR__ . "/Service/TodolistService.php";
require_once __DIR__ . "/View/TodolistView.php";
require_once "Config/Database.php";

// use Entity\Todolist;
use Respository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

echo "Applikasi Todolist" . PHP_EOL;

$connection = Config\Database::getConnection();
$todolistRepository = new TodolistRepositoryImpl($connection);
$todolistService = new TodolistServiceImpl($todolistRepository);
$todolistView = new TodolistView($todolistService);

$todolistView->showTodolist();