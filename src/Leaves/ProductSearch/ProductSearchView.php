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
            <div class="col-xs-2">
                <?php $this->printFilters() ?>
            </div>
            <div class="col-xs-10">
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
        <div class="search-product row">
            <div class="col-xs-3 product-image">
                <img src="{$product->getDefaultImage()}">
            </div>
            <div class="col-xs-6">
                <h2>{$product->Name}</h2>
            </div>
            <div class="col-xs-3">
                <h2><b>&pound{$product->getDefaultProductVariation()->Price}</b></h2>
                <a href="{$product->getPublicUrl()}" class="button">View</a>
            </div>
        </div>
HTML;
    }
}
