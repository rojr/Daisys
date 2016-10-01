<?php

namespace Daisys;

use Daisys\Views\DaisyDefaultView;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\Encryption\HashProvider;
use Rhubarb\Crown\Encryption\Sha512HashProvider;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Leaf\LeafModule;
use Rhubarb\Stem\Custard\SeedDemoDataCommand;
use Rhubarb\Stem\Repositories\MySql\MySql;
use Rhubarb\Stem\Repositories\Repository;
use Rhubarb\Stem\StemModule;
use SuperCMS\Custard\ApplicationDemoDataSeeder;
use SuperCMS\Layouts\DefaultLayout;
use SuperCMS\Leaves\IndexView;
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

        HashProvider::setProviderClassName(Sha512HashProvider::class);

        $this->container()->registerClass(IndexView::class, DaisyDefaultView::class);
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
    }

    public function getCustardCommands()
    {
        SeedDemoDataCommand::registerDemoDataSeeder(new ApplicationDemoDataSeeder());

        return parent::getCustardCommands();
    }
}
