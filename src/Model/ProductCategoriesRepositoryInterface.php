<?php

declare(strict_types=1);

namespace App\Model;

use App\Entity\ProductCategory;

interface ProductCategoriesRepositoryInterface
{

    /**
     * @return ProductCategory[]
     */
    public function getAll(): array;

    /**
     * @return ProductCategory[]
     */
    public function getFeatured(): array;
}
