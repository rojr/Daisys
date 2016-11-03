<?php

namespace Daisys\Leaves\Views;

use Daisys\Views\SearchPanelTrait;
use SuperCMS\Leaves\Site\Basket\BasketPageView;

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
