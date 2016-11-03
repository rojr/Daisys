<?php

namespace Daisys;

use Daisys\Layouts\DaisysLayout;
use Daisys\Leaves\DaisyIndexView;
use Daisys\Leaves\ProductSearch\ProductSearchLeaf;
use Daisys\Leaves\Views\DaisysBasketPageView;
use Daisys\Leaves\Views\ProductView;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\Encryption\HashProvider;
use Rhubarb\Crown\Encryption\Sha512HashProvider;
use Rhubarb\Crown\Html\ResourceLoader;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Stem\Custard\SeedDemoDataCommand;
use Rhubarb\Stem\Repositories\MySql\MySql;
use Rhubarb\Stem\Repositories\Repository;
use SuperCMS\Custard\ApplicationDemoDataSeeder;
use SuperCMS\Leaves\IndexView;
use SuperCMS\Leaves\Site\Basket\BasketPageView;
use SuperCMS\Leaves\Site\Product\ProductItemView;
use SuperCMS\SuperCMS;

class DaisysApplication extends Application
{
    protected function initialise()
    {
        parent::initialise();

        if (file_exists(APPLICATION_ROOT_DIR . "/settings/site.config.php")) {
            include_once(APPLICATION_ROOT_DIR . "/settings/site.config.php");
        }

        $this->developerMode = true;

        Repository::setDefaultRepositoryClassName(MySql::class);

        ResourceLoader::loadResource('/static/css/daisy.css');

        HashProvider::setProviderClassName(Sha512HashProvider::class);

        LayoutModule::setLayoutClassName(DaisysLayout::class);

        $this->container()->registerClass(IndexView::class, DaisyIndexView::class);
        $this->container()->registerClass(ProductItemView::class, ProductView::class);
        $this->container()->registerClass(BasketPageView::class, DaisysBasketPageView::class);
    }

    protected function getModules()
    {
        return [
            new SuperCMS($this->container()),
        ];
    }

    protected function registerUrlHandlers()
    {
        parent::registerUrlHandlers();

        $this->addUrlHandlers(
            [
                '/search/' => $searchHandler = new ClassMappedUrlHandler(ProductSearchLeaf::class),
            ]
        );

        $searchHandler->setPriority(100);
    }

    public function getCustardCommands()
    {
        SeedDemoDataCommand::registerDemoDataSeeder(new ApplicationDemoDataSeeder());

        return parent::getCustardCommands();
    }
}
