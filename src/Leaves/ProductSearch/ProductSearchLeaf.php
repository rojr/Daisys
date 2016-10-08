<?php

namespace Daisys\Leaves\ProductSearch;

use Daisys\Session\DaisySession;
use Rhubarb\Leaf\Leaves\Leaf;
use Rhubarb\Stem\Filters\AndGroup;
use Rhubarb\Stem\Filters\AnyWordsGroup;
use SuperCMS\Models\Product\Product;

class ProductSearchLeaf extends Leaf
{
    protected function getViewClass()
    {
        return ProductSearchView::class;
    }

    protected function createModel()
    {
        $session = DaisySession::singleton();

        $model = new ProductSearchModel();
        $model->searchedProducts = Product::find(new AndGroup(
            new AnyWordsGroup(['Name'], $session->searchQuery)
        ));


        return $model;
    }
}
