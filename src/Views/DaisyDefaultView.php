<?php

namespace Daisys\Views;

use Daisys\Controls\Search\SearchLeaf;
use Rhubarb\Leaf\Views\View;

class DaisyDefaultView extends View
{
    protected function createSubLeaves()
    {
        $this->registerSubLeaf(
            new SearchLeaf('Search')
        );
    }

    protected function printViewContent()
    {
        ?>
        <div class="search-controls">
            <?= $this->leaves['Search'] ?>
        </div>
        <?php
    }
}
