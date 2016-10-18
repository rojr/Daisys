<?php

namespace Daisys\Views;

use Daisys\Controls\Search\SearchLeaf;
use Rhubarb\Leaf\Views\View;

class DaisyDefaultView extends View
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
    }
}
