<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $productService
    ) {}

    public function store(
        StoreProductRequest $request
    ) {

        try {

            $product = $this->productService
                ->create($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Product created successfully.',
                'data' => new ProductResource($product),
            ], Response::HTTP_CREATED);
        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Internal Server Error.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(int $id)
    {
        try {

            $product = $this->productService
                ->findById($id);

            if (!$product) {

                return response()->json([
                    'success' => false,
                    'message' => 'Product not found.',
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'success' => true,
                'data' => new ProductResource($product),
            ], Response::HTTP_OK);
        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Internal Server Error.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(
        UpdateProductRequest $request,
        int $id
    ) {

        try {

            $product = $this->productService
                ->update(
                    $id,
                    $request->validated()
                );

            if (!$product) {

                return response()->json([
                    'success' => false,
                    'message' => 'Product not found.',
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully.',
                'data' => new ProductResource($product),
            ], Response::HTTP_OK);
        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Internal Server Error.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function index()
    {
        try {

            $products = $this->productService
                ->getAll();

            return response()->json([
                'success' => true,
                'data' => new ProductCollection($products),
            ], Response::HTTP_OK);
        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Internal Server Error.',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
