<?php

namespace MyLibrary\Belajar\PHP\MVC\App {

  function header(string $value) {
    echo $value;
  }

}

namespace MyLibrary\Belajar\PHP\MVC\Controller {

  use MyLibrary\Belajar\PHP\MVC\Config\Database;
  use MyLibrary\Belajar\PHP\MVC\Repository\UserRepository;
  use MyLibrary\Belajar\PHP\MVC\Domain\User;
  use PHPUnit\Framework\TestCase;
  
  class UserControllerTest extends TestCase {
  
    private UserController $userController;
    private UserRepository $userRepository;
  
    protected function setUp(): void {
      $this->userController = new UserController();
  
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
  
  }

}

