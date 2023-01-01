<?php

// Clean Architecture
// Repository Pattern

require_once "03-getConnection.php";
require_once "Model/Comment.php";
require_once "Repository/CommentRepository.php";
use Model\Comment;
use Respository\CommentRepositoryImpl;

$connection = getConnection();
$repository = new CommentRepositoryImpl($connection);

// insert()
// $comment = new Comment(email: "repository@test.com", comment: "Hi");
// $newComment = $repository->insert($comment);
// var_dump($newComment->getId());

// findById()
// $comment = $repository->findById(48);
// var_dump($comment);

// findAll()
$comment = $repository->findAll();
var_dump($comment);



$connection = null;