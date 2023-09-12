# Base10 Encoder/Decoder

This algorithm works like Base64 but uses numbers only as the output encoded string.

_Not sure why you would want it, tho._

Please note that due to the limited character set, the output strings are going too long.

[Compatible Javascript/Node version here](https://www.npmjs.com/package/base10)

## Examples

```
<?php

include './src/Base10.php';

$original = 'Hello, world!';
echo "Original string: " . $original . PHP_EOL;

$encoded = jesobreira\Base10::encode($original);
echo "Encoded string: " . $encoded . PHP_EOL;

$decoded = jesobreira\Base10::decode($encoded);
echo "Decoded string " . $decoded . PHP_EOL;
```

Or with composer (`composer require jesobreira/base10`):

```
<?php

require __DIR__ . '/vendor/autoload.php';  // Require Composer's autoloader

use jesobreira\Base10;

$original = 'Hello, world!';
echo "Original string: " . $original . PHP_EOL;

$encoded = Base10::encode($original);
echo "Encoded string: " . $encoded . PHP_EOL;

$decoded = Base10::decode($encoded);
echo "Decoded string " . $decoded . PHP_EOL;
```
