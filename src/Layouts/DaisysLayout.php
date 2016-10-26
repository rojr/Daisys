<?php

namespace Daisys\Layouts;

use SuperCMS\Layouts\DefaultLayout;

class DaisysLayout extends DefaultLayout
{
    protected function printNavigationItems()
    {
        ?>
        <div class="c-menu-items">
            <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            <a href="/"><i class="fa fa-home" aria-hidden="true"></i> About us</a>
            <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Latest news</a>
            <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Contact us</a>
        </div>
        <?php
    }
}
