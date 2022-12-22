<?php

require_once "view/view-show-todolist.php";
require_once "business-logic/add-todolist.php";

addTodolist("Rifki 1");
addTodolist("Rifki 2");
addTodolist("Rifki 3");
addTodolist("Rifki 4");
addTodolist("Rifki 5");

viewShowTodolist();