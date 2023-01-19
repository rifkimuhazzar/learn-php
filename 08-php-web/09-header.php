<?php

// menambah http response
header("Application: Belajar PHP Web");
header("Author: Rifki Muhazzar");

// menambah/menampilkan http request
$client = $_SERVER["HTTP_CLIENT_NAME"];

echo "Hello $client";