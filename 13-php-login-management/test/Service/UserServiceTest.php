<?php

namespace MyLibrary\Belajar\PHP\MVC\Service;

use MyLibrary\Belajar\PHP\MVC\Config\Database;
use MyLibrary\Belajar\PHP\MVC\Domain\User;
use MyLibrary\Belajar\PHP\MVC\Model\UserRegisterRequest;
use MyLibrary\Belajar\PHP\MVC\Repository\UserRepository;
use MyLibrary\Belajar\PHP\MVC\Exception\ValidationException;
use MyLibrary\Belajar\PHP\MVC\Model\UserLoginRequest;
use MyLibrary\Belajar\PHP\MVC\Model\UserPasswordUpdateRequest;
use MyLibrary\Belajar\PHP\MVC\Model\UserProfileUpdateRequest;
use MyLibrary\Belajar\PHP\MVC\Repository\SessionRepository;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase {

  private UserService $userService;
  private UserRepository $userRepository;
  private SessionRepository $sessionRepository;

  protected function setUp(): void {
    $connection = Database::getConnection();
    $this->userRepository = new UserRepository($connection);
    $this->userService = new UserService($this->userRepository);
    $this->sessionRepository = new SessionRepository($connection);

    $this->sessionRepository->deleteAll();
    $this->userRepository->deleteAll();
  }

  public function testRegisterSuccess() {
    $request= new UserRegisterRequest();
    $request->id = "rifki";
    $request->name = "Rifki";
    $request->password = "rahasia123";

    $response = $this->userService->register($request);

    self::assertEquals($request->id, $response->user->id);
    $this->assertEquals($request->name, $response->user->name);
    self::assertNotEquals($request->password, $response->user->password);

    self::assertTrue(password_verify($request->password, $response->user->password));
  }

  public function testRegisterFailed() {
    $this->expectException(ValidationException::class);

    $request = new UserRegisterRequest();
    $request->id = "";
    $request->name = "";
    $request->password = "";

    $this->userService->register($request);
  }

  public function testRegisterDuplicate() {
    $user = new User();
    $user->id = "rifki";
    $user->name = "Rifki";
    $user->password = "rahasia123";

    $this->userRepository->save($user);

    $this->expectException(ValidationException::class);

    $request = new UserRegisterRequest();
    $request->id = "rifki";
    $request->name = "Rifki";
    $request->password = "rahasia123";

    $this->userService->register($request);
  }

  public function testLoginNotFound() {
    $this->expectException(ValidationException::class);

    $request = new UserLoginRequest();
    $request->id = "rifki";
    $request->password = "rahasia123";

    $this->userService->login($request);
  }

  public function testLoginWrongPassword() {
    $user = new User();
    $user->id = "rifki";
    $user->name = "Rifki";
    $user->password = password_hash("123", PASSWORD_BCRYPT);

    $this->expectException(ValidationException::class);

    $request = new UserLoginRequest();
    $request->id = "rifki";
    $request->password = "salah";

    $this->userService->login($request);
  }

  public function testLoginSuccess() {
    $user = new User();
    $user->id = "rifki";
    $user->name = "Rifki";
    $user->password = password_hash("123", PASSWORD_BCRYPT);

    $this->expectException(ValidationException::class);

    $request = new UserLoginRequest();
    $request->id = "rifki";
    $request->password = "123";

    $response = $this->userService->login($request);

    self::assertEquals($request->id, $response->user->id);
    self::assertTrue(password_verify($request->password, $response->user->password));
  }

  public function testUpdateSuccess() {
    $user = new User();
    $user->id = "rifki";
    $user->name = "Rifki";
    $user->password = password_hash("123", PASSWORD_BCRYPT);
    $this->userRepository->save($user);

    $request = new UserProfileUpdateRequest();
    $request->id = "rifki";
    $request->name = "Hello";

    $this->userService->updateProfile($request);

    $result = $this->userRepository->findById($user->id);

    self::assertEquals($request->name, $result->name);
  }

  public function testUpdateValidationError() {
    $this->expectException(ValidationException::class);

    $request = new UserProfileUpdateRequest();
    $request->id = "";
    $request->name = "";

    $this->userService->updateProfile($request);
  }

  public function testUpdateNotFound() {
    $this->expectException(ValidationException::class);

    $request = new UserProfileUpdateRequest();
    $request->id = "rifki";
    $request->name = "Hello";

    $this->userService->updateProfile($request);
  }

  public function testUpdatePasswordSuccess() {
    $user = new User();
    $user->id = "rifki";
    $user->name = "Rifki";
    $user->password = password_hash("123", PASSWORD_BCRYPT);
    $this->userRepository->save($user);

    $request = new UserPasswordUpdateRequest();
    $request->id = "rifki";
    $request->oldPassword = "123";
    $request->newPassword = "rifki123";

    $this->userService->updatePassword($request);

    $result = $this->userRepository->findById($user->id);
    self::assertTrue(password_verify($request->newPassword, $result->password));
  }

  public function testUpdatePasswordValidationError() {
    $this->expectException(ValidationException::class);

    $request = new UserPasswordUpdateRequest();
    $request->id = "rifki";
    $request->oldPassword = " ";
    $request->newPassword = " ";

    $this->userService->updatePassword($request);
  }

  public function testUpdatePasswordWrongOldPassword() {
    $this->expectException(ValidationException::class);

    $user = new User();
    $user->id = "rifki";
    $user->name = "Rifki";
    $user->password = password_hash("123", PASSWORD_BCRYPT);
    $this->userRepository->save($user);

    $request = new UserPasswordUpdateRequest();
    $request->id = "rifki";
    $request->oldPassword = "salah";
    $request->newPassword = "rifki123";

    $this->userService->updatePassword($request);
  }

  public function testUpdatePasswordNotFound() {
    $this->expectException(ValidationException::class);

    $request = new UserPasswordUpdateRequest();
    $request->id = "rifki";
    $request->oldPassword = "123";
    $request->newPassword = "rifki123";

    $this->userService->updatePassword($request);
  }

}