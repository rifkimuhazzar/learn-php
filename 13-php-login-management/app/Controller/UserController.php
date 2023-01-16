<?php

namespace MyLibrary\Belajar\PHP\MVC\Controller;

use MyLibrary\Belajar\PHP\MVC\App\View;
use MyLibrary\Belajar\PHP\MVC\Config\Database;
use MyLibrary\Belajar\PHP\MVC\Exception\ValidationException;
use MyLibrary\Belajar\PHP\MVC\Model\UserLoginRequest;
use MyLibrary\Belajar\PHP\MVC\Model\UserRegisterRequest;
use MyLibrary\Belajar\PHP\MVC\Repository\SessionRepository;
use MyLibrary\Belajar\PHP\MVC\Repository\UserRepository;
use MyLibrary\Belajar\PHP\MVC\Service\SessionService;
use MyLibrary\Belajar\PHP\MVC\Service\UserService;

class UserController {

  private UserService $userService;
  private SessionService $sessionService;

  public function __construct() {
    $connection = Database::getConnection();
    $userRepository = new UserRepository($connection);
    $this->userService = new UserService($userRepository);
    
    $sessionRepository = new SessionRepository($connection);
    $this->sessionService = new SessionService($sessionRepository, $userRepository);
  }

  public function register() {
    View::render("User/register", [
      "title" => "Register new user",
    ]);
  }

  public function postRegister() {
    $request = new UserRegisterRequest;
    $request->id = $_POST["id"];
    $request->name = $_POST["name"];
    $request->password = $_POST["password"];

    try {
      $this->userService->register($request);
      View::redirect("/users/login");
    } catch (ValidationException $exception) {
      View::render("User/register", [
        "title" => "Register new user",
        "error" => $exception->getMessage()
      ]);
    }
  }

  public function login() {
    View::render("User/login", [
      "title" => "Login user"
    ]);
  }

  public function postLogin() {
    $request = new UserLoginRequest();
    $request->id = $_POST["id"];
    $request->password = $_POST["password"];

    try {
      $response = $this->userService->login($request);

      $this->sessionService->create($response->user->id);

      View::redirect("/");
    } catch (ValidationException $exception) {
      View::render("User/login", [
        "title" => "Login user",
        "error" => $exception->getMessage()
      ]);
    }
  }

}