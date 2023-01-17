<?php

namespace MyLibrary\Belajar\PHP\MVC\Middleware {

  require_once __DIR__ . "/../Helper/helper.php";

  use MyLibrary\Belajar\PHP\MVC\Config\Database;
  use MyLibrary\Belajar\PHP\MVC\Domain\Session;
  use MyLibrary\Belajar\PHP\MVC\Domain\User;
  use MyLibrary\Belajar\PHP\MVC\Repository\SessionRepository;
  use MyLibrary\Belajar\PHP\MVC\Repository\UserRepository;
  use MyLibrary\Belajar\PHP\MVC\Service\SessionService;
  use PHPUnit\Framework\TestCase;

  class MustNotLoginMiddlewareTest extends TestCase {

    private MustNotLoginMiddleware $middleware;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;

    protected function setUp(): void {
      $this->middleware = new MustNotLoginMiddleware();
      putenv("mode=test");

      $this->userRepository = new UserRepository(Database::getConnection());
      $this->sessionRepository = new SessionRepository(Database::getConnection());

      $this->sessionRepository->deleteAll();
      $this->userRepository->deleteAll();
    }

    public function testBeforeGuest() {
      $this->middleware->before();
      $this->expectOutputString("");
    }

    public function testBeforeLoginUser() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = "rahasia";
      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->middleware->before();
      $this->expectOutputRegex("[Location: /]");
    }
    
  }

}

