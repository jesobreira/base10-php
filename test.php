<?php

include './src/Base10.php';

$original = 'Hello, world!';
echo "Original string: " . $original . PHP_EOL;

$encoded = jesobreira\Base10::encode($original);
echo "Encoded string: " . $encoded . PHP_EOL;

$decoded = jesobreira\Base10::decode($encoded);
echo "Decoded string " . $decoded . PHP_EOL;
