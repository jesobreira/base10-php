<?php

include './src/Base10.php';

$original = 'Hello, world!';
echo "Original string: " . $original . PHP_EOL;

$encoded = Base10\Base10::encode($original);
echo "Encoded string: " . $encoded . PHP_EOL;

$decoded = Base10\Base10::decode($encoded);
echo "Decoded string " . $decoded . PHP_EOL;
