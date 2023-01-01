<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../Config/Database.php";

use Entity\Todolist;
use Respository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist(): void {
  $connection = Config\Database::getConnection();
  $todolistRepository = new TodolistRepositoryImpl($connection);
  $todolistService = new TodolistServiceImpl($todolistRepository);

  $todolistService->addTodolist("A");
  $todolistService->addTodolist("B");
  $todolistService->addTodolist("C");

  $todolistService->showTodolist();
}
testShowTodolist();

// Test Add Todolist
function testAddTodolist(): void {
  $connection = Config\Database::getConnection();
  $todolistRepository = new TodolistRepositoryImpl($connection);

  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistService->addTodolist("A");
  $todolistService->addTodolist("B");
  $todolistService->addTodolist("C");

  // $todolistService->showTodolist();
}
// testAddTodolist();

// Test Remove Todolist
function testRemoveTodolist(): void {
  $connection = Config\Database::getConnection();
  $todolistRepository = new TodolistRepositoryImpl($connection);

  $todolistService = new TodolistServiceImpl($todolistRepository);

  echo $todolistService->removeTodolist(8) . PHP_EOL;
  echo $todolistService->removeTodolist(7) . PHP_EOL;
  echo $todolistService->removeTodolist(6) . PHP_EOL;
  echo $todolistService->removeTodolist(5) . PHP_EOL;
  echo $todolistService->removeTodolist(4) . PHP_EOL;
  echo $todolistService->removeTodolist(3) . PHP_EOL;
  echo $todolistService->removeTodolist(2) . PHP_EOL;
  echo $todolistService->removeTodolist(1) . PHP_EOL;
}
// testRemoveTodolist();