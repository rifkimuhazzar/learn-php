<?php

function stop(): never {
  echo "1";
  exit();
}

stop();

echo "2";