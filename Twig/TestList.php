<?php

/*
 * This file is part of AlbTwigReflectionBundle
 *
 * (c) 2012 Arnaud Le Blanc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alb\TwigReflectionBundle\Twig;

/**
 * @author Arnaud Le Blanc <arnaud.lb@gmail.com>
 */
class TestList extends FunctionListAbstract
{
    protected function getFunctions()
    {
        $functions = [];

        foreach ($this->twig->getExtensions() as $extension) {
            foreach ($extension->getTests() as $name => $function) {
                $info = new TestInfo($name, $function, $extension);
                $functions[$name] = $info;
            }
        }

        foreach ($this->twig->getTests() as $name => $function) {
            if (isset($functions[$name])) {
                continue;
            }
            $info = new TestInfo($name, $function);
            $functions[$name] = $info;
        }

        return $functions;
    }
}
