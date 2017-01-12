<?php

namespace Daisys\Leaves\Views;

use SuperCMS\Leaves\Site\Product\ProductItemView;
use SuperCMS\Views\SearchPanelTrait;

class ProductView extends ProductItemView
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
