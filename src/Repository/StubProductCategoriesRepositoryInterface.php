<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Asset;
use App\Entity\ProductCategory;
use App\Model\ProductCategoriesRepositoryInterface;

class StubProductCategoriesRepositoryInterface implements ProductCategoriesRepositoryInterface
{

    /**
     * @return ProductCategory[]
     */
    public function getAll(): array
    {
        return [
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png')),
        ];
    }

    /**
     * @return ProductCategory[]
     */
    public function getFeatured(): array
    {
        return [
            new ProductCategory('Some product', 'describing some product', new Asset('https://via.placeholder.com/1000x400.png'))
        ];
    }
}
