<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\Store;

class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function access(Store $storeStore, Product $product)
    {
        return $storeStore->id === $product->store_id;
    }
}
