<?php

$matches = [];
// preg_match tanpa _all untuk menemukan 1 pattern saja kemudian berhenti
$result = preg_match_all("/rifki|ar|hazz/i", "Rifki Muhazzar", $matches);
var_dump($result);
var_dump($matches);

$result = preg_replace("/anjing|bangsat|babi/i", "***", "dasar lu anjing babi dan bangsat!");
var_dump($result);

$result = preg_split("/[\s,-]/", "Rifki Muhazzar, Web-Developer,Frontend");
var_dump($result);