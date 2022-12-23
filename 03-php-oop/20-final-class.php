<?php

// gunakan final di depan class agar classnya tidak bisa diwariskan lagi

class SocialMedia {
  public string $name;
}

final class Facebook extends SocialMedia {

}

// error
/*
class Instagram extends Facebook{

}
*/