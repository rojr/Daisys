<?php

namespace Daisys\Leaves\ProductSearch;

use Rhubarb\Leaf\Leaves\LeafModel;
use Rhubarb\Stem\Collections\Collection;
use SuperCMS\Models\Product\Product;

class ProductSearchModel extends LeafModel
{
    /** @var Product[]|Collection */
    public $searchedProducts;
}
