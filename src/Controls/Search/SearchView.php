<?php

namespace Daisys\Controls\Search;

use Daisys\Session\DaisySession;
use Rhubarb\Crown\Exceptions\ForceResponseException;
use Rhubarb\Crown\Response\RedirectResponse;
use Rhubarb\Leaf\Controls\Common\Buttons\Button;
use Rhubarb\Leaf\Controls\Common\Text\TextBox;
use Rhubarb\Leaf\Leaves\LeafDeploymentPackage;
use Rhubarb\Leaf\Views\View;

class SearchView extends View
{
    protected function createSubLeaves()
    {
        $this->registerSubLeaf(
            $input = new TextBox('Query'),
            $submit = new Button('Search', 'Search', function() {
                $session = DaisySession::singleton();
                $session->searchQuery = $this->model->Query;
                $session->storeSession();
                throw new ForceResponseException(new RedirectResponse('/search/'));
            })
        );

        $input->addHtmlAttribute('autocomplete', 'off');

        $input->setPlaceholderText('Search for products');
        $submit->addCssClassNames('search-button');
    }

    protected function printViewContent()
    {
        ?>

        <div class="row search-group">
            <div class="col-sm-10 search-input">
                <i class="fa fa-search" aria-hidden="true"></i>
                <?= $this->leaves['Query']; ?>
                <ul class="search-response"></ul>
            </div>
            <div class="col-sm-2">
                <?= $this->leaves['Search']; ?>
            </div>
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
