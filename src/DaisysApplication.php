<?php

namespace Daisys;

use Daisys\Leaves\DaisyIndexView;
use Daisys\Leaves\ProductSearch\ProductSearchLeaf;
use Daisys\Leaves\Views\ProductView;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\Encryption\HashProvider;
use Rhubarb\Crown\Encryption\Sha512HashProvider;
use Rhubarb\Crown\Html\ResourceLoader;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Leaf\LeafModule;
use Rhubarb\Stem\Custard\SeedDemoDataCommand;
use Rhubarb\Stem\Repositories\MySql\MySql;
use Rhubarb\Stem\Repositories\Repository;
use Rhubarb\Stem\StemModule;
use SuperCMS\Custard\ApplicationDemoDataSeeder;
use SuperCMS\Layouts\DefaultLayout;
use SuperCMS\Leaves\IndexView;
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

        //SolutionSchema::registerSchema('HackTheHubSchema', HackTheHubSolutionSchema::class);
        ResourceLoader::loadResource('/static/css/daisy.css');

        HashProvider::setProviderClassName(Sha512HashProvider::class);

        $this->container()->registerClass(IndexView::class, DaisyIndexView::class);
        $this->container()->registerClass(ProductItemView::class, ProductView::class);
    }

    protected function getModules()
    {
        return [
            new SuperCMS($this->container()),
            new LayoutModule(DefaultLayout::class),
            new StemModule(),
            new LeafModule(),
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
