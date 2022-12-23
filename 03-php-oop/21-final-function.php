<?php

// gunakan final di depan function agar functionya tidak bisa dioverride lagi

class SocialMedia {
  final public function login(string $username, string $password): bool {
    return false;
  }
}

class Facebook extends SocialMedia {
  // error
  /*
  public function login(string $username, string $password): bool {
    return true;
  }
  */
}