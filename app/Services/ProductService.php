<?php

namespace App\Services;

class ProductService
{
    private string $filePath;

    public function __construct()
    {
        $this->filePath = storage_path(
            'app/products/products.json'
        );
    }

    public function getAll(): array
    {
        return $this->readProducts();
    }

    private function readProducts(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $products = file_get_contents($this->filePath);

        return json_decode($products, true) ?? [];
    }

    private function writeProducts(array $products): void
    {
        file_put_contents(
            $this->filePath,
            json_encode(
                $products,
                JSON_PRETTY_PRINT
            )
        );
    }

    public function create(array $data): array
    {
        $products = $this->readProducts();

        $nextId = empty($products)
            ? 1
            : max(array_column($products, 'id')) + 1;

        $product = [
            'id' => $nextId,
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'price' => $data['price'],
            'quantity' => $data['quantity'],
        ];

        $products[] = $product;

        $this->writeProducts($products);

        return $product;
    }

    public function findById(int $id): ?array
    {
        $products = $this->readProducts();

        foreach ($products as $product) {

            if ($product['id'] === $id) {
                return $product;
            }
        }

        return null;
    }

    public function update(
        int $id,
        array $data
    ): ?array {

        $products = $this->readProducts();

        foreach ($products as $index => $product) {

            if ($product['id'] === $id) {

                $products[$index] = array_merge(
                    $product,
                    $data
                );

                $this->writeProducts($products);

                return $products[$index];
            }
        }

        return null;
    }
}
