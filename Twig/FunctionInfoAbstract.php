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
abstract class FunctionInfoAbstract
{
    protected $name;
    protected $function;
    protected $extension;

    public function __construct($name, $function, \Twig_ExtensionInterface $extension = null)
    {
        $this->name = $name;
        $this->function = $function;
        $this->extension = $extension;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFunction()
    {
        return $this->function;
    }

    public function getExtension()
    {
        return $this->extension;
    }

    public function getExtensionName()
    {
        $extension = $this->extension;

        if (null !== $extension) {
            return $extension->getName();
        }
    }

    abstract public function getParametersSignatureString();

    protected function getParametersSignatureStringFromReflectionFunction(\ReflectionFunctionAbstract $function, $skipParams)
    {
        $params = $function->getParameters();
        $params = array_slice($params, $skipParams);
        $string = '';
        foreach ($params as $param) {
            if ('' !== $string) {
                $string .= ', ';
            }
            if ($param->isPassedByReference()) {
                $string .= '&';
            }
            $string .= '$' . $param->getName();
            if ($param->isDefaultValueAvailable()) {
                $default = $param->getDefaultValue();
                $defaultString = var_export($default, true);
                $defaultString = str_replace("\n", '', $defaultString);
                $string .= ' = ' . $defaultString;
            }
        }

        return $string;
    }
}

