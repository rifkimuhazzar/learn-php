<?php

namespace MyLibrary\Belajar\PHP\MVC\Repository;

use MyLibrary\Belajar\PHP\MVC\Config\Database;
use MyLibrary\Belajar\PHP\MVC\Domain\User;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase {

  private UserRepository $userRepository;
  private SessionRepository $sessionRepository;

  protected function setUp(): void {
    $this->sessionRepository = new SessionRepository(Database::getConnection());
    $this->sessionRepository->deleteAll();

    $this->userRepository = new UserRepository(Database::getConnection());
    $this->userRepository->deleteAll();
  }

  public function testSaveSuccess() {
    $user = new User();
    $user->id = "178";
    $user->name = "Rifki";
    $user->password = "rahasia123";

    $this->userRepository->save($user);

    $result = $this->userRepository->findById($user->id);
    
    self::assertEquals($user->id, $result->id);
    self::assertEquals($user->name, $result->name);
    self::assertEquals($user->password, $result->password);
  }

  public function testFindByIdNotFound() {
    $user = $this->userRepository->findById("notfound");
    self::assertNull($user);
  }

  public function testUpdate() {
    $user = new User();
    $user->id = "178";
    $user->name = "Rifki";
    $user->password = "rahasia123";

    $this->userRepository->save($user);

    $user->name = "Hello";
    $this->userRepository->update($user);

    $result = $this->userRepository->findById($user->id);

    self::assertEquals($user->id, $result->id);
    self::assertEquals($user->name, $result->name);
    self::assertEquals($user->password, $result->password);
  }

}