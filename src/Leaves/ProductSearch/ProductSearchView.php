<?php

namespace Daisys\Leaves\ProductSearch;

use Daisys\Views\DaisyDefaultView;
use SuperCMS\Models\Product\Product;

class ProductSearchView extends DaisyDefaultView
{
    /** @var ProductSearchModel */
    protected $model;

    protected function printViewContent()
    {
        parent::printViewContent();

        ?>
        <div class="row">
            <div class="col-sm-2">
                <?php $this->printFilters() ?>
            </div>
            <div class="col-sm-10">
                <?php $this->printProducts()?>
            </div>
        </div>
        <?php
    }

    protected function printFilters()
    {
    }

    protected function printProducts()
    {
        print '<div class="products-list">';
        foreach($this->model->searchedProducts as $product) {
            $this->printProduct($product);
        }
        print '</div>';
    }

    protected function printProduct(Product $product)
    {
        print <<<HTML
        <div class="search-product row marginless">
            <div class="col-sm-3 product-image">
                <img src="{$product->getDefaultImage()}">
            </div>
            <div class="col-sm-6 product-description">
                <p class="product-title">{$product->Name}</p>
                <p class="c-description">{$product->Description}</p>
            </div>
            <div class="col-sm-3 product-price">
                <div class="pull-right">
                    <p class="product-cost pull-right">&pound{$product->getDefaultProductVariation()->Price}</p>
                    <a href="{$product->getPublicUrl()}" class="button pull-right">View</a>
                </div>
            </div>
        </div>
HTML;
    }
}
