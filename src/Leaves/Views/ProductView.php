<?php

namespace Daisys\Leaves\Views;

use Daisys\Views\SearchPanelTrait;
use SuperCMS\Leaves\Site\Product\ProductItemView;

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
