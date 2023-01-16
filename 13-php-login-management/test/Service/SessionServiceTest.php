<?php

namespace MyLibrary\Belajar\PHP\MVC\Service;

use MyLibrary\Belajar\PHP\MVC\Config\Database;
use MyLibrary\Belajar\PHP\MVC\Domain\Session;
use MyLibrary\Belajar\PHP\MVC\Repository\SessionRepository;
use MyLibrary\Belajar\PHP\MVC\Repository\UserRepository;
use MyLibrary\Belajar\PHP\MVC\Domain\User;
use PHPUnit\Framework\TestCase;

function setcookie(string $name, string $value) {
  echo "$name: $value";
}

class SessionServiceTest extends TestCase {

  private SessionService $sessionService;
  private SessionRepository $sessionRepository;
  private UserRepository $userRepository;

  protected function setUp(): void {
    $this->sessionRepository = new SessionRepository(Database::getConnection());
    $this->userRepository = new UserRepository(Database::getConnection());
    $this->sessionService = new SessionService($this->sessionRepository, $this->userRepository);

    $this->sessionRepository->deleteAll();
    $this->userRepository->deleteAll();

    $user = new User();
    $user->id = "rifki";
    $user->name = "Rifki";
    $user->password = "rahasia";
    $this->userRepository->save($user);
  }

  public function testCreate() {
    $session = $this->sessionService->create("rifki");

    $this->expectOutputRegex("[X-MY-SESSION: $session->id]");

    $result = $this->sessionRepository->findById($session->id);

    self::assertEquals("rifki", $result->userId);
  }

  public function testDestroy() {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = "rifki";

    $this->sessionRepository->save($session);
    
    $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

    $this->sessionService->destroy();

    $this->expectOutputRegex("[X-MY-SESSION: ]");

    $result = $this->sessionRepository->findById($session->id);
    self::assertNull($result);
  }

  public function testCurrent() {
    $session = new Session();
    $session->id = uniqid();
    $session->userId = "rifki";

    $this->sessionRepository->save($session);

    $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

    $user = $this->sessionService->current();

    self::assertEquals($session->userId, $user->id);
  }

}