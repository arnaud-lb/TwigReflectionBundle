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

use Symfony\Component\Console\Output\OutputInterface;
use Alb\TwigReflectionBundle\Table\Table;

/**
 * @author Arnaud Le Blanc <arnaud.lb@gmail.com>
 */
abstract class FunctionListAbstract
{
    protected $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function dumpList(OutputInterface $output)
    {
        $functions = $this->getFunctions();

        ksort($functions);

        $table = new Table;
        $table->addHeaderValues(array('Function', '', 'Extension'));

        foreach ($functions as $function) {
            $table->addRowValues(array(
                $function->getName(),
                '('.$function->getParametersSignatureString().')',
                $function->getExtensionName(),
            ));
        }

        $widths = $table->getColumnWidths();

        $format = sprintf("%%-%ds    %%s", $widths[0]+$widths[1]);

        foreach ($table->getHeaders() as $header) {
            $output->writeln(sprintf($format, $header->getValue(0), $header->getValue(2)));
        }

        $format = "<Comment>%s</Comment>%s    %s";

        foreach ($table->getRows() as $row) {
            $name = $row->getValue(0);
            $params = $row->getValue(1);
            $padding = str_repeat(' ', ($widths[0]+$widths[1])-(strlen($name)+strlen($params)));
            $output->writeln(sprintf($format, $name, $params.$padding, $row->getValue(2)));
        }
    }
 
    abstract protected function getFunctions();
}
