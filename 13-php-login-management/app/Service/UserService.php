<?php

namespace MyLibrary\Belajar\PHP\MVC\Service;

use MyLibrary\Belajar\PHP\MVC\Model\UserRegisterRequest;
use MyLibrary\Belajar\PHP\MVC\Model\UserRegisterResponse;
use MyLibrary\Belajar\PHP\MVC\Repository\UserRepository;
use MyLibrary\Belajar\PHP\MVC\Domain\User;
use MyLibrary\Belajar\PHP\MVC\Exception\ValidationException;
use MyLibrary\Belajar\PHP\MVC\Config\Database;
use MyLibrary\Belajar\PHP\MVC\Model\UserLoginRequest;
use MyLibrary\Belajar\PHP\MVC\Model\UserLoginResponse;
use MyLibrary\Belajar\PHP\MVC\Model\UserProfileUpdateRequest;
use MyLibrary\Belajar\PHP\MVC\Model\UserProfileUpdateResponse;
use MyLibrary\Belajar\PHP\MVC\Model\UserPasswordUpdateRequest;
use MyLibrary\Belajar\PHP\MVC\Model\UserPasswordUpdateResponse;

class UserService {

  private UserRepository $userRepository;

  public function __construct(UserRepository $userRepository) {
    $this->userRepository = $userRepository;
  }

  public function register(UserRegisterRequest $request): UserRegisterResponse {
    $this->validateUserRegistrationRequest($request);

    try {
      Database::beginTransaction();
      $user = $this->userRepository->findById($request->id);
      if ($user != null) {
        throw new ValidationException("User Id already exist");
      }

      $user = new User();
      $user->id = $request->id;
      $user->name = $request->name;
      $user->password = password_hash($request->password, PASSWORD_BCRYPT);

      $this->userRepository->save($user);

      $response = new UserRegisterResponse();
      $response->user = $user;
      Database::commitTransaction();
      return $response;
    } catch (\Exception $exception) {
      Database::rollbackTransaction();
      throw $exception;
    }
  }

  private function validateUserRegistrationRequest(UserRegisterRequest $request) {
    if ($request->id == null || $request->name == null || $request->password == null || trim($request->id) == "" || trim($request->name) == "" || trim($request->password) == "") {
      throw new ValidationException("Id, Name, Password can't blank");
    }
  }

  public function login(UserLoginRequest $request): UserLoginResponse {
    $this->validateUserLoginRequest($request);

    $user = $this->userRepository->findById($request->id);
    if ($user == null) {
      throw new ValidationException("Id or Password is wrong");
    }

    if (password_verify($request->password, $user->password)) {
      $response = new UserLoginResponse();
      $response->user = $user;
      return $response;
    } else {
      throw new ValidationException("Id or Password is wrong");
    }
  }

  private function validateUserLoginRequest(UserLoginRequest $request) {
    if ($request->id == null || $request->password == null || trim($request->id) == "" || trim($request->password) == "") {
      throw new ValidationException("Id, Password can't blank");
    }
  }

  public function updateProfile(UserProfileUpdateRequest $request): UserProfileUpdateResponse {
    $this->validateUserProfileUpdateRequest($request);

    try {
      Database::beginTransaction();

      $user = $this->userRepository->findById($request->id);
      if ($user == null) {
        throw new ValidationException("User is not found");
      }

      $user->name = $request->name;
      $this->userRepository->update($user);

      Database::commitTransaction();

      $response = new UserProfileUpdateResponse();
      $response->user = $user;
      return $response;
    } catch (\Exception $exception) {
      Database::rollbackTransaction();
      throw $exception;
    }
  }

  private function validateUserProfileUpdateRequest(UserProfileUpdateRequest $request) {
    if ($request->id == null || $request->name == null || trim($request->id) == "" || trim($request->name) == "") {
      throw new ValidationException("Id, Name can't blank");
    }
  }

  public function updatePassword(UserPasswordUpdateRequest $request): UserPasswordUpdateResponse {
    $this->validateUserPasswordUpdateRequest($request);

    try {
      Database::beginTransaction();

      $user = $this->userRepository->findById($request->id);
      if ($user == null) {
        throw new ValidationException("User is not found");
      }

      if (!password_verify($request->oldPassword, $user->password)) {
        throw new ValidationException("Old Password is wrong");
      }

      $user->password = password_hash($request->newPassword, PASSWORD_BCRYPT);
      $this->userRepository->update($user);

      Database::commitTransaction();

      $response = new UserPasswordUpdateResponse();
      $response->user = $user;
      return $response;
    } catch (\Exception $exception) {
      Database::rollbackTransaction();
      throw $exception;
    }
  }

  private function validateUserPasswordUpdateRequest(UserPasswordUpdateRequest $request) {
    if ($request->id == null || $request->oldPassword == null || $request->newPassword == null || trim($request->id) == "" || trim($request->oldPassword) == "" || trim($request->newPassword) == "") {
      throw new ValidationException("Id, Name, Old Password, New Password can't blank");
    }
  }
}