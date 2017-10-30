# Range generator

[![Coverage Status](https://coveralls.io/repos/github/ptopczewski/range-generator/badge.svg?branch=master)](https://coveralls.io/github/ptopczewski/range-generator?branch=master)
[![Build Status](https://travis-ci.org/ptopczewski/range-generator.svg?branch=master)](https://travis-ci.org/ptopczewski/range-generator)

A small lib for generating a range array by a start and end value.

## Examples

### Numeric range

```php
<?php

require 'vendor/autoload.php';

$generator = new \RangeGenerator\Services\Generator();
$generator->addHandler(new \RangeGenerator\Services\Handlers\Numeric());

$values = $generator->buildRange(5, 10);

```


```php
[
    5, 6, 7, 8, 9, 10
]

```

```php
<?php

require 'vendor/autoload.php';

$generator = new \RangeGenerator\Services\Generator();
$generator->addHandler(new \RangeGenerator\Services\Handlers\Numeric());

$values = $generator->buildRange('020', '015');

```

```php
[
    '020', '019', '018', '017', '016', '015'
]

```

### Character range

```php
<?php

require 'vendor/autoload.php';

$generator = new \RangeGenerator\Services\Generator();
$generator->addHandler(new \RangeGenerator\Services\Handlers\Character());

$values = $generator->buildRange('AAB', 'AAF');

```

```php
[
    'AAB', 'AAC', 'AAD', 'AAF'
]

```

### Numeric range with labels
```php
<?php

require 'vendor/autoload.php';

$generator = new \RangeGenerator\Services\Generator();
$generator->addHandler(new \RangeGenerator\Services\Handlers\NumericWithLabel());

$values = $generator->buildRange('MyZone04 - medium', 'MyZone09 - medium'');

```

```php
[
    'MyZone04 - medium',
    'MyZone05 - medium',
    'MyZone06 - medium',
    'MyZone07 - medium',
    'MyZone08 - medium',
    'MyZone09 - medium'
]

```