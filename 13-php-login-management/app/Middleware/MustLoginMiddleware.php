<?php

namespace MyLibrary\Belajar\PHP\MVC\Middleware;

use MyLibrary\Belajar\PHP\MVC\App\View;
use MyLibrary\Belajar\PHP\MVC\Config\Database;
use MyLibrary\Belajar\PHP\MVC\Repository\SessionRepository;
use MyLibrary\Belajar\PHP\MVC\Repository\UserRepository;
use MyLibrary\Belajar\PHP\MVC\Service\SessionService;

class MustLoginMiddleware implements Middleware {

  private SessionService $sessionService;

  public function __construct() {
    $sessionRepository = new SessionRepository(Database::getConnection());
    $userRepository = new UserRepository(Database::getConnection());
    $this->sessionService = new SessionService($sessionRepository, $userRepository);
  }

  public function before(): void {
    $user = $this->sessionService->current();
    if ($user == null) {
      View::redirect("/users/login");
    }
  }

}