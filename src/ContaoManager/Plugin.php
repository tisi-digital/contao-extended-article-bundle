<?php
declare(strict_types=1);

/*
 * This file is part of extendedArticle.
 * 
 * (c) Timon Sixt 2022 <mail@tisi-digital.de>
 */

namespace TisiDigital\ContaoExtendedArticleBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use TisiDigital\ContaoExtendedArticleBundle\ContaoExtendedArticleBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
{
    return [
        BundleConfig::create(ContaoExtendedArticleBundle::class)
            ->setLoadAfter([ContaoCoreBundle::class]),
    ];
}

    public function getRouteCollection(LoaderResolverInterface $resolver, KernelInterface $kernel)
{
    return $resolver
        ->resolve(__DIR__.'/../../config/routes.yml')
        ->load(__DIR__.'/../../config/routes.yml')
        ;
}
}