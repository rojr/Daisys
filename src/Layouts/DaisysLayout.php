<?php

namespace Daisys\Layouts;

use SuperCMS\Controls\GlobalBasket\GlobalBasket;
use SuperCMS\Layouts\DefaultLayout;

class DaisysLayout extends DefaultLayout
{
    protected function printNavigationItems()
    {
        ?>
        <nav class="navbar navbar-default navbar-static-top">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="c-mobile c-mobile-basket">
                    <a href="/basket/"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                </div>
                <a class="navbar-brand" href="#">Daisy Newry</a>
            </div>
        <div id="navbar" class="navbar-collapse collapse" style="height: 1px;">
            <ul class="nav navbar-nav c-menu-items">
                <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                <li><a href="/"><i class="fa fa-info-circle" aria-hidden="true"></i> About us</a></li>
                <li><a href="/"><i class="fa fa-commenting-o" aria-hidden="true"></i> Contact us</a></li>
                <li><?= $this->printBasket(true)?></li>
            </ul>
        </div>
        </nav>

        <?php
    }

    protected function printBasket($print = false)
    {
        if ($print) {
            ob_start();
            ?>
            <div id="c-global-basket">
                <?= GlobalBasket::getInstance()->getOnlyHTML() ?>
            </div>
            <?php
            return ob_get_clean();

        }
    }
    protected function printHead()
    {
        parent::printHead();
        
        ?>
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/static/favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/static/favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/static/favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/static/favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/static/favicon/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/static/favicon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/static/favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/static/favicon/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="/static/favicon/favicon-196x196.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="/static/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="/static/favicon/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/static/favicon/favicon-16x16.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="/static/favicon/favicon-128.png" sizes="128x128" />
        <meta name="application-name" content="&nbsp;"/>
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
        <?php
    }


}
