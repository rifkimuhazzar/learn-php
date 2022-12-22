<?php

require_once "helper/input.php";
require_once "business-logic/remove-todolist.php";

function viewRemoveTodolist() {
  echo "MENGHAPUS TODO" . PHP_EOL;

  $pilihan = input("Nomor (x - untuk membatalkan)");

  if ($pilihan == "x") {
    echo "Batal menghapus todo" . PHP_EOL;
  } else {
    $success = removeTodolist($pilihan);

    if ($success) {
      echo "Sukses menghapus todo nomor $pilihan" . PHP_EOL;
    } else {
      echo "Gagal menghapus todo nomor $pilihan" . PHP_EOL;
    }
  }
}