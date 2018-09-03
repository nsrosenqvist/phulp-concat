Phulp Concat
============

It's a third-party project that lets you concatenate all files from the source into
a single file.

## Installation

```bash
composer require nsrosenqvist/phulp-concat
```

## Usage

First argument is required and should be name of the file you want to create.
Second argument is an optional `bool` that specifies if you should also add a new
line after the content of each file (default is `false`).

```php
<?php

use NSRosenqvist\Phulp\Concat;

$phulp->task('scripts', function ($phulp) {
    $phulp->src(['assets/scripts/'], '/js$/')
        ->pipe(new Concat('theme.js', true))
        ->pipe($phulp->dest('dist/scripts/'));
});
```

## License
MIT
