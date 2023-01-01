<?php

namespace Respository {

    use Model\Comment;

  interface CommentRepository {
    function insert(Comment $comment): Comment;
    function findById(int $id): ?Comment;
    function findAll(): array;
  }

  class CommentRepositoryImpl implements CommentRepository {
    public function __construct(private \PDO $connection) {
    }

    public function insert(Comment $comment): Comment {
      $sql = "insert into comments (email, comment) values (?, ?)";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$comment->getEmail(), $comment->getComment()]);

      $id = $this->connection->lastInsertId();
      $comment->setId($id);

      return $comment;
    }

    public function findById(int $id): ?Comment {
      $sql = "select * from comments where id = ?";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      if ($row = $statement->fetch()) {
        return new Comment (
          id: $row["id"],
          email: $row["email"],
          comment: $row["comment"],
        );
      } else {
        return null;
      }
    }

    public function findAll(): array {
      $sql = "select * from comments";
      $statement = $this->connection->query($sql);

      $array = [];
      while ($row = $statement->fetch()) {
        $array[] = new Comment (
          id: $row["id"],
          email: $row["email"],
          comment: $row["comment"],
        );
      }
      return $array;
    }

  }
  

}