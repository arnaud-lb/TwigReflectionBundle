<?php

/*
 * This file is part of AlbTwigReflectionBundle
 *
 * (c) 2012 Arnaud Le Blanc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alb\TwigReflectionBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputInterface;
use Alb\TwigReflectionBundle\Table\Table;
use Alb\TwigReflectionBundle\Twig\FilterList;

/**
 * @author Arnaud Le Blanc <arnaud.lb@gmail.com>
 */
class TwigListFiltersCommand extends ContainerAwareCommand
{
    public function configure()
    {
        $this->setName('twig:list:filters');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $container = $this->getContainer();
        $twig = $container->get('twig');

        $list = new FilterList($twig);
        $list->dumpList($output);
    }
}

