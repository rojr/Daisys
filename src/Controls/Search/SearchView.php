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
            $input = new TextBox('Query')
        );

        $input->setPlaceholderText('Search for products');
    }

    protected function printViewContent()
    {
        ?>

        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8 search-input">
                <i class="fa fa-search" aria-hidden="true"></i>
                <?= $this->leaves['Query']; ?>
                <ul class="search-response"></ul>
            </div>
            <div class="col-xs-2"></div>
        </div>

        <?php
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
