<?php

namespace Daisys\Controls\Search;

use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Leaves\LeafDeploymentPackage;
use Rhubarb\Leaf\Views\View;

class SearchView extends View
{
    protected function createSubLeaves()
    {
        $this->registerSubLeaf(
            new TextBox('Query')
        );
    }

    protected function printViewContent()
    {
        print '<i class="fa fa-search" aria-hidden="true"></i>';
        print $this->leaves['Query'];
    }

    public function getDeploymentPackage()
    {
        $package = new LeafDeploymentPackage();
        $package->resourcesToDeploy[] = __DIR__ . '/' . $this->getViewBridgeName() . '.js';
        return $package;
    }

    protected function getViewBridgeName()
    {
        return 'SearchViewBridge';
    }
}
