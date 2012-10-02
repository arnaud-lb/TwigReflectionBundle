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
$ composer require alb/twig-reflection-bundle:*
```

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

## Commands

### twig:list:functions

Lists Twig functions with parameters and extensions

### twig:list:filters

Lists Twig filters with parameters and extensions

### twig:list:tests

Lists Twig tests with parameters and extensions