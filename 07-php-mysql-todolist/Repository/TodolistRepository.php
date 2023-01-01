<?php

namespace Respository {
    use Entity\Todolist;

  interface TodolistRepository {
    function save(Todolist $todolist): void;
    function remove(int $number): bool;
    function findAll(): array;
  }

  class TodolistRepositoryImpl implements TodolistRepository {
    public array $todolist = [];

    private \PDO $connection;

    public function __construct(\PDO $connection) {
      $this->connection = $connection;
    }

    function save(Todolist $todolist): void {
      $sql = "INSERT INTO todolist(todo) VALUES (?)";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$todolist->getTodo()]);
    }

    function remove(int $number): bool {
      $sql = "select * from todolist where id = ?";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$number]);

      if ($statement->fetch()) {
        // todolist ada
        $sql = "delete from todolist where id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$number]);
        return true;
      } else {
        // todolist tidak ada
        return false;
      }
      
    }

    function findAll(): array {
      $sql = "select id, todo from todolist";
      $statement = $this->connection->prepare($sql);
      $statement->execute();

      $result = [];

      foreach($statement as $row) {
        $todolist = new Todolist();
        $todolist->setId($row["id"]);
        $todolist->setTodo($row["todo"]);
        $result[] = $todolist;
      }

      return $result;
    }
  }
}