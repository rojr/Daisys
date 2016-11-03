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
                'https://img.ctrlcube.com/edc60b95/95e8fa24d35b7163255712fd72cc74a7934f919b.jpg',
                'https://img.ctrlcube.com/edc60b95/f196be13621125762ce9e267998b74a07f76f617.jpg',
                'https://img.ctrlcube.com/edc60b95/e8c9d4c089e51c83c15fc93e595de3654f31fe5e.jpg',
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
            <div class="col-sm-6">
                <div class="promotional-content">
                a
                </div>
            </div>
            <div class="col-sm-6">
                <div class="promotional-content">
                b
                </div>
            </div>
        </div>
        <div class="row promotional-row">
            <div class="col-sm-4">
                <div class="promotional-content">
                a
                </div>
            </div>
            <div class="col-sm-4">
                <a href="https://www.facebook.com/profile.php?id=100013456516170">
                    <div class="promotional-content" id="facebook-link">
                        <img src="/static/images/fblogo.png"/>
                    </div>
                </a>
            </div>
            <div class="col-sm-4">
                <div class="promotional-content">
                c
                </div>
            </div>
        </div>
HTML;
    }
}
