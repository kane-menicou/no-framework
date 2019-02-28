<?php

declare(strict_types=1);

namespace App\Entity;

class ProductCategory
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Asset
     */
    private $image;

    public function __construct(string $name, string $description, Asset $image)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return Asset
     */
    public function getImage(): string
    {
        return $this->image->getLocation();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
