<?php

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\Todolist;
use Respository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

function testShowTodolist(): void {
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistRepository->todolist[1] = new Todolist("A");
  $todolistRepository->todolist[2] = new Todolist("B");
  $todolistRepository->todolist[3] = new Todolist("C");

  $todolistService = new TodolistServiceImpl($todolistRepository);

  $todolistService->showTodolist();
}
// testShowTodolist();

// Test Add Todolist
function testAddTodolist(): void {
  $todolistRepository = new TodolistRepositoryImpl();

  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistService->addTodolist("A");
  $todolistService->addTodolist("B");
  $todolistService->addTodolist("C");

  $todolistService->showTodolist();
}
// testAddTodolist();

// Test Remove Todolist
function testRemoveTodolist(): void {
  $todolistRepository = new TodolistRepositoryImpl();

  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistService->addTodolist("A");
  $todolistService->addTodolist("B");
  $todolistService->addTodolist("C");

  $todolistService->showTodolist();

  $todolistService->removeTodolist(1);
  $todolistService->showTodolist();

  $todolistService->removeTodolist(3);
  $todolistService->showTodolist();

  $todolistService->removeTodolist(2);
  $todolistService->showTodolist();

  $todolistService->removeTodolist(1);
  $todolistService->showTodolist();

  $todolistService->removeTodolist(0);
  $todolistService->showTodolist();
}
testRemoveTodolist();