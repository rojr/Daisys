<?php

namespace Daisys\Leaves\Views;

use SuperCMS\Leaves\Site\Basket\BasketPageView;
use SuperCMS\Views\SearchPanelTrait;

class DaisysBasketPageView extends BasketPageView
{
    use SearchPanelTrait;

    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $this->createSearchPanel();
    }

    protected function printViewContent()
    {
        $this->printSearchPanel();
        parent::printViewContent();
    }
}
