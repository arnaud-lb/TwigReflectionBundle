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
class TestInfo extends FunctionInfoAbstract
{
    public function getParametersSignatureString()
    {
        $function = $this->function;
        $skipParams = 1;

        if ($function instanceof \Twig_Test_Function) {
            $prop = new \ReflectionProperty($function, 'function');
            $prop->setAccessible(true);
            $actualFunction = $prop->getValue($function);
            try {
                $reflectionFunction = new \ReflectionFunction($actualFunction);
                return $this->getParametersSignatureStringFromReflectionFunction($reflectionFunction, $skipParams);
            } catch(\Exception $e) {
                return '';
            }
        } else if ($function instanceof \Twig_Test_Method) {
            $prop = new \ReflectionProperty($function, 'method');
            $prop->setAccessible(true);
            $actualMethod = $prop->getValue($function);
            $prop = new \ReflectionProperty($function, 'extension');
            $prop->setAccessible(true);
            $extension = $prop->getValue($function);
            try {
                $reflectionMethod = new \ReflectionMethod($extension, $actualMethod);
                return $this->getParametersSignatureStringFromReflectionFunction($reflectionMethod, $skipParams);
            } catch(\Exception $e) {
                return '';
            }
        } else {
            return '';
        }
    }
}
