<?php

// int
echo "Desimal: ";
var_dump(1234);

echo "Octal: ";
var_dump(0123);

echo "Desimal: ";
var_dump(0x1a);

echo "Desimal: ";
var_dump(0b10101);

echo "Underscore in number: ";
var_dump(1_750_000);

// float
echo "Floating point: ";
var_dump(1.234);

echo "Floating point with E notation - (1.7 x 1000): ";
var_dump(1.7e3);

echo "Floating point with E notation minus - (1.7 x 0.001): ";
var_dump(1.7e-3);

echo "Underscore in floating point: ";
var_dump(1_234.567);

// int overflow
echo "Int overflow: ";
var_dump(9223372036854775808); // 7
