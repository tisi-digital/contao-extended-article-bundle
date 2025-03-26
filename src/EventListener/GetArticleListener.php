<?php
namespace TisiDigital\ContaoExtendedArticleBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\ArticleModel;
use TisiDigital\ContaoExtendedArticleBundle\Classes\ClassExtArticle;
	
#[AsHook('getArticle')]
class GetArticleListener
{
    public function __invoke(ArticleModel $article): void
    {
        $classExtArticle = new ClassExtArticle();
        $classExtArticle->myGetArticle($article);

    }
}