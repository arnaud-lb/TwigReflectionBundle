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
class Table
{
    private $headers = [];
    private $rows = [];

    public function addHeaderValues($values)
    {
        $this->headers[] = new Row($values);
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function addRowValues($values)
    {
        $this->rows[] = new Row($values);
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function getColumnWidths()
    {
        $widths = [];
        $allRows = array_merge($this->headers, $this->rows);

        foreach ($allRows as $row) {
            foreach ($row->getValues() as $index => $value) {
                if (!isset($widths[$index])) {
                    $widths[$index] = 0;
                }
                $widths[$index] = max($widths[$index], strlen($value));
            }
        }

        return $widths;
    }
}
