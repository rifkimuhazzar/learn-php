<?php

require_once "model/todolist.php";
require_once "business-logic/show-todolist.php";
require_once "view/view-add-todolist.php";
require_once "view/view-remove-todolist.php";
require_once "helper/input.php";

function viewShowTodolist() {
  while (true) {
    showTodolist();

    echo "MENU" . PHP_EOL;
    echo "1. Tambah Todo" . PHP_EOL;
    echo "2. Hapus Todo" . PHP_EOL;
    echo "x. Keluar" . PHP_EOL;

    $pilihan = input("Pilih");

    if ($pilihan == "1") {
      viewAddTodolist();
    } else if ($pilihan == "2") {
      viewRemoveTodolist();
    } else if ($pilihan == "x") {
      break;
    } else {
      echo "Pilihan tidak dimengerti" . PHP_EOL;
    }
  }

  echo "Anda telah keluar";
}