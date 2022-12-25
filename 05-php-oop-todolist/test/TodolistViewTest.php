<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once "Service/TodolistService.php";
require_once "View/TodolistView.php";
require_once "Helper/InputHelper.php";

use Entity\Todolist;
use Respository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

function testViewShowTodolist(): void {
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistView = new TodolistView($todolistService);

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Database");

  $todolistView->showTodolist();
}
// testViewShowTodolist();

// Test Add View
function testViewAddTodolist(): void {
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistView = new TodolistView($todolistService);

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Database");

  $todolistService->showTodolist();

  $todolistView->addTodolist();
  $todolistService->showTodolist();

  $todolistView->addTodolist();
  $todolistService->showTodolist();
}
// testViewAddTodolist();

// Test Remove View
function testViewRemoveTodolist(): void {
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistView = new TodolistView($todolistService);

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Database");

  $todolistService->showTodolist();

  $todolistView->RemoveTodolist();
  $todolistService->showTodolist();

  $todolistView->RemoveTodolist();
  $todolistService->showTodolist();
}
testViewRemoveTodolist();