<?php

namespace Daisys\Leaves;

use Daisys\Views\DaisyDefaultView;
use SuperCMS\Controls\Carousel\Carousel;

class DaisyIndexView extends DaisyDefaultView
{
    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $this->registerSubLeaf(
            $carousel = new Carousel('Carousel')
        );

        $carousel->setCarouselImages(
            [
                'https://upload.wikimedia.org/wikipedia/commons/3/3f/The_Body_Shop_in_the_Prudential_Center,_Boston_MA.jpg',
                'https://a2ua.com/shop/shop-010.jpg'
            ]
        );
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        print '<div id="main-page-slider">';
        print $this->leaves[ 'Carousel' ];
        print '</div>';
        print <<<HTML
        <div class="row promotional-row">
            <div class="col-xs-6">
                <div class="promotional-content">
                a
                </div>
            </div>
            <div class="col-xs-6">
                <div class="promotional-content">
                b
                </div>
            </div>
        </div>
        <div class="row promotional-row">
            <div class="col-xs-4">
                <div class="promotional-content">
                a
                </div>
            </div>
            <div class="col-xs-4">
                <a href="https://www.facebook.com/profile.php?id=100013456516170">
                    <div class="promotional-content" id="facebook-link">
                        <img src="/static/images/fblogo.png"/>
                    </div>
                </a>
            </div>
            <div class="col-xs-4">
                <div class="promotional-content">
                c
                </div>
            </div>
        </div>
HTML;
    }
}
