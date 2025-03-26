<?php
declare(strict_types=1);

/*
 * This file is part of extendedArticle.
 * 
 * (c) Timon Sixt 2025 <mail@tisi-digital.de>
 */

namespace TisiDigital\ContaoExtendedArticleBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoExtendedArticleBundle extends Bundle
{
	/**
	 * {@inheritdoc}
	 */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}