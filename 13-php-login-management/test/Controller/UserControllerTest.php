<?php

namespace MyLibrary\Belajar\PHP\MVC\Controller {

  require_once __DIR__ . "/../Helper/helper.php";

  use MyLibrary\Belajar\PHP\MVC\Config\Database;
  use MyLibrary\Belajar\PHP\MVC\Domain\Session;
  use MyLibrary\Belajar\PHP\MVC\Repository\UserRepository;
  use MyLibrary\Belajar\PHP\MVC\Domain\User;
  use MyLibrary\Belajar\PHP\MVC\Model\UserPasswordUpdateRequest;
  use MyLibrary\Belajar\PHP\MVC\Repository\SessionRepository;
  use MyLibrary\Belajar\PHP\MVC\Service\SessionService;
  use PHPUnit\Framework\TestCase;
  
  class UserControllerTest extends TestCase {
  
    private UserController $userController;
    private UserRepository $userRepository;
    private SessionRepository $sessionRepository;
  
    protected function setUp(): void {
      $this->userController = new UserController();

      $this->sessionRepository = new SessionRepository(Database::getConnection());
      $this->sessionRepository->deleteAll();
  
      $this->userRepository = new UserRepository(Database::getConnection());
      $this->userRepository->deleteAll();

      putenv("mode=test");
    }
  
    public function testRegister() {
      $this->userController->register();
      
      $this->expectOutputRegex("[Register]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Register new user]");
    }
  
    public function testPostRegisterSuccess() {
      $_POST["id"] = "rifki";
      $_POST["name"] = "Rifki";
      $_POST["password"] = "rahasia123";
  
      $this->userController->postRegister();
  
      $this->expectOutputString("Location: /users/login");
    }
  
    public function testPostRegisterValidationError() {
      $_POST["id"] = "";
      $_POST["name"] = "Rifki";
      $_POST["password"] = "rahasia123";
  
      $this->userController->postRegister();
      
      $this->expectOutputRegex("[Register]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Register new user]");
      $this->expectOutputRegex("[Id, Name, Password can't blank]");
    }
  
    public function testPostRegisterDuplicate() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = "rahasia123";
  
      $this->userRepository->save($user);
  
      $_POST["id"] = "rifki";
      $_POST["name"] = "Rifki";
      $_POST["password"] = "rahasia123";
  
      $this->userController->postRegister();
      
      $this->expectOutputRegex("[Register]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Register new user]");
      $this->expectOutputRegex("[User Id already exist]");
    }

    public function testLogin() {
      $this->userController->login();

      $this->expectOutputRegex("[Login user]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Password]");
    }

    public function testLoginSuccess() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $_POST["id"] = "rifki";
      $_POST["password"] = "rahasia";
      
      $this->userController->postLogin();

      $this->expectOutputRegex("[Location: /]");
      $this->expectOutputRegex("[X-MY-SESSION: ]");
    }

    public function testLoginValidationError() {
      $_POST["id"] = "";
      $_POST["password"] = "";

      $this->userController->postLogin();

      $this->expectOutputRegex("[Login user]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id, Password can't blank]");
    }

    public function testLoginUserNotFound() {
      $_POST["id"] = "notfound";
      $_POST["password"] = "notfound";

      $this->userController->postLogin();

      $this->expectOutputRegex("[Login user]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id or Password is wrong]");
    }

    public function testLoginWrongPassword() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);
      
      $_POST["id"] = "rifki";
      $_POST["password"] = "123";

      $this->userController->postLogin();

      $this->expectOutputRegex("[Login user]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id or Password is wrong]");
    }

    public function testLogout() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->logout();

      $this->expectOutputRegex("[Location: /]");
      $this->expectOutputRegex("[X-MY-SESSION: ]");
    }

    public function testUpdateProfile() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->updateProfile();

      $this->expectOutputRegex("[Profile]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[rifki]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Rifki]");
    }

    public function testPostUpdateProfileSuccess() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST["name"] = "Hello";
      $this->userController->postUpdateProfile();

      $this->expectOutputRegex("[Location: /]");

      $result = $this->userRepository->findById("rifki");
      self::assertEquals("Hello", $result->name);
    }

    public function testPostUpdateProfileValidationError() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST["name"] = "";
      $this->userController->postUpdateProfile();

      $this->expectOutputRegex("[Profile]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[rifki]");
      $this->expectOutputRegex("[Name]");
      $this->expectOutputRegex("[Id, Name can't blank]");
    }

    public function testUpdatePassword() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $this->userController->updatePassword();

      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[rifki]");
    }


    public function testPostUpdatePasswordSuccess() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST["oldPassword"] = "rahasia";
      $_POST["newPassword"] = "12345";

      $this->userController->postUpdatePassword();

      $this->expectOutputRegex("[Location: /]");

      $result = $this->userRepository->findById($user->id);
      self::assertTrue(password_verify("12345", $result->password));
    }

    public function testUpdatePasswordValidationError() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST["oldPassword"] = "";
      $_POST["newPassword"] = "";

      $this->userController->postUpdatePassword();

      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[rifki]");
      $this->expectOutputRegex("[Id, Name, Old Password, New Password can't blank]");
    }

    public function testPostUpdatePasswordWrongOldPassword() {
      $user = new User();
      $user->id = "rifki";
      $user->name = "Rifki";
      $user->password = password_hash("rahasia", PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $session = new Session();
      $session->id = uniqid();
      $session->userId = $user->id;
      $this->sessionRepository->save($session);

      $_COOKIE[SessionService::$COOKIE_NAME] = $session->id;

      $_POST["oldPassword"] = "salah";
      $_POST["newPassword"] = "12345";

      $this->userController->postUpdatePassword();

      $this->expectOutputRegex("[Password]");
      $this->expectOutputRegex("[Id]");
      $this->expectOutputRegex("[rifki]");
      $this->expectOutputRegex("[Old Password is wrong]");
    }
    
  }

}

