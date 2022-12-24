<?php

$dateTime = new DateTime(); // waktu dan tanggal saat ini
$dateTime->setDate(2023, 12, 20); // mengubah tanggal
$dateTime->setTime(10, 27, 20, 0); // mengubah waktu, microsecond default 0

// Y M D . W H M S
// dateinterval memanipulasi waktu sebagian saja
$dateTime->add(new DateInterval("P2Y")); // untuk menambah 1th, P adalah period ini selalu digunakan

$minusOneMonth = new DateInterval("P1M");
$minusOneMonth->invert = 1; // mengurangi waktu | ture/1 sama saja
$dateTime->add($minusOneMonth);

var_dump($dateTime);

// mengubah timezone, bisa dari function | date.timezone di xampp/php/php.ini (untuk windows)
$now = new DateTime();
var_dump($now);
$now->setTimeZone(new DateTimeZone("Asia/Qatar"));
var_dump($now);

// mengkonversi dateTime ke string dengan format()
echo "Waktu saat ini : {$now->format("Y-m-d H:i:s")}" .PHP_EOL;

// mengkonversi dari string ke dateTime dengan createFromFormat()
// default timezonenya adalah timezone di php
$date = DateTime::createFromFormat("Y-m-d H:i:s", "2022-10-10 10:10:10", new DateTimeZone("Asia/Jakarta"));
var_dump($date);