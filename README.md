# Brave Content Security Policy

## Installation

1. Add the following to the `repositories` section of your `composer.json`:

    ```json
    {
      "type": "vcs",
      "url": "git@github.com:yardinternet/brave-csp.git"
    }
    ```

2. Install this package with composer:

    ```sh
    composer require yard/brave-csp
    ```

## Features

This repository contains a basic Content Security Policy (CSP):

`Yard\Csp\Policies\Basic::class`

This Policy extends:

`Spatie\Csp\Policies\Policy::class`

## Usage

This policy can be registered in the `csp` config file provided by the `spatie/laravel-csp` package:

```php
<?php

declare(strict_types=1);

return [

    /*
     * A policy will determine which CSP headers will be set. A valid CSP policy is
     * any class that extends `Spatie\Csp\Policies\Policy`
     */
    'policy' => Yard\Csp\Policies\Basic::class,
    
    ...
];
```

It can also be extended to create a custom policy:

```php
<?php

declare(strict_types=1);

namespace App\Csp;

use Yard\Csp\Policies\Basic;

class Policy extends Basic
{
    public function configure()
    {
        parent::configure();

        // Add site specific csp directives below
    }
}
```

In this case the `policy` config should point to this custom policy:

```php
<?php

declare(strict_types=1);

return [

    /*
     * A policy will determine which CSP headers will be set. A valid CSP policy is
     * any class that extends `Spatie\Csp\Policies\Policy`
     */
    'policy' => App\Csp\Policy::class,

    ...
];
