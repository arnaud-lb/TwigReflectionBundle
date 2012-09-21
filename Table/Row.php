<?php

/*
 * This file is part of AlbTwigReflectionBundle
 *
 * (c) 2012 Arnaud Le Blanc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alb\TwigReflectionBundle\Table;

/**
 * @author Arnaud Le Blanc <arnaud.lb@gmail.com>
 */
class Row
{
    private $values;

    public function __construct($values)
    {
        $this->values = array_values($values);
    }

    public function getValue($index)
    {
        if (!isset($this->values[$index])) {
            return null;
        }
        return $this->values[$index];
    }

    public function getValues()
    {
        return $this->values;
    }
}
