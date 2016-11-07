<?php

namespace Daisys\Leaves;

use Daisys\Views\DaisyDefaultView;
use Rhubarb\Crown\Settings\HtmlPageSettings;
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

        $pageSettings = HtmlPageSettings::singleton();
        $pageSettings->pageTitle = 'Daisys Newry';
    }

    protected function printViewContent()
    {
        parent::printViewContent();
        print <<<HTML
        <div class="c-page-promotional">
            <div class="row promotional-row">
                <div class="col-sm-6">
                    <div class="promotional-content">
                        <a href="/category/thread/">
                            <div class="c-promotional-image" id="c-image-wool"></div>
                            <div class="c-promotional-text">
                                <h3>Explore our wool offers</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="promotional-content">
                        <a href="/category/mens/">
                            <div class="c-promotional-image" id="c-image-pattern"></div>
                            <div class="c-promotional-text">
                                <h3>New Patterns every week</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row promotional-row">
                <div class="col-sm-4">
                    <div class="promotional-content">
                        <a href="/category/jewellery/">
                            <div class="c-promotional-image" id="c-image-jewellery"></div>
                            <div class="c-promotional-text">
                                <h3>View our Jewellery</h3>
                            </div>
                        </a>
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
                        <a href="/category/Christmas-Special-Occasions/">
                            <div class="c-promotional-image" id="c-image-seasonal"></div>
                            <div class="c-promotional-text">
                                <h3>Seasonal items</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
HTML;
    }
}
