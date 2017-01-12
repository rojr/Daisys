<?php

namespace Daisys\Views;

use Rhubarb\Leaf\Views\View;
use SuperCMS\Views\SearchPanelTrait;

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
