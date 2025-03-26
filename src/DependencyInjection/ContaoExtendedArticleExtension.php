<?php
declare(strict_types=1);

/*
 * This file is part of extendedArticle.
 * 
 * (c) Timon Sixt 2022 <mail@tisi-digital.de>
 */

namespace TisiDigital\ContaoExtendedArticleBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ContaoExtendedArticleExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        (new YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config')))
            ->load('services.yml');
    }
}