# Twig Reflection Bundle

Displays what's in Twig.

Twig Relfection bundle provides commands for listing functions, filters, tests.

## Example

    $ ./app/console twig:list:functions
    Function                                                 Extension
    asset($path, $packageName = NULL)                        assets
    assets_version($packageName = NULL)                      assets
    code($template)                                          demo
    constant($const_name)                                    core
    csrf_token()                                             form
    cycle($values, $i)                                       core
    date($date = NULL, $timezone = NULL)                     core
    dump()                                                   debug
    [...]

## Install

```
$ composer require alb/twig-reflection-bundle
```

When asked for a version constraint, type `*` and hit enter.

## Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Alb\TwigReflectionBundle\AlbTwigReflectionBundle(),
    );
}
```

