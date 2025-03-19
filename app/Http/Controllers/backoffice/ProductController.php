<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\AttributeValueService;
use App\Services\CategoryService;
use App\Services\BrandService;
use App\Services\ProductService;
use App\Services\WebTranslationService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    protected ProductService $productService;
    protected CategoryService $categoryService;
    protected BrandService $brandService;
    protected AttributeValueService $attributeValueService;
    protected WebTranslationService $webTranslationService;
    const PROCESS_NAME = 'product';

    public function __construct(ProductService $productService, CategoryService $categoryService, WebTranslationService $webTranslationService, BrandService $brandService, AttributeValueService $attributeValueService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->webTranslationService = $webTranslationService;
        $this->brandService = $brandService;
        $this->attributeValueService = $attributeValueService;
    }

    public function index(): View
    {
        return view('backoffice.product.index', ['process_name' => self::PROCESS_NAME]);
    }

    public function datatable(): JsonResponse
    {
        $products = $this->productService->getAllProductData();

        return DataTables::of($products)
            ->addColumn('slug', function ($product) {
                //return "<a href='".route('product.show', ['slug' => $product->slug])."'>$product->slug</a>";
                return "<a href='#'>$product->slug</a>";
            })
            ->addColumn('status', function ($product) {
                return $product->status == 1
                    ? '<span class="badge bg-label-primary me-1">Aktif</span>'
                    : '<span class="badge bg-label-danger me-1">Pasif</span>';
            })
            ->addColumn('name', function ($product) {
                return $product->name ?? '';
            })
            ->addColumn('actions', function ($product) {
                return "
                <a class='dropdown-item waves-effect' href='" . route('backoffice.product.show', $product->id) . "'><i class='ti ti-pencil me-1'></i> Güncelle</a>
                <a class='dropdown-item waves-effect' type='button' onclick='productDelete($product->id)'><i class='ti ti-trash me-1'></i> Sil</a>
            ";
            })
            ->rawColumns(['slug', 'status', 'actions'])
            ->make(true);
    }


    public function create(): View
    {
        $categories = $this->categoryService->getAllCategory();
        $brands = $this->brandService->getAllBrand();
        $attributeValues = $this->attributeValueService->getAllAttributeValue();
        return view('backoffice.product.create', ['process_name' => self::PROCESS_NAME, 'categories' => $categories, 'brands' => $brands, 'attributeValues' => $attributeValues]);
    }


    public function store(ProductRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $product = $this->productService->productCreate($request->only([
                'category_id',
                'brand_id',
                'display_order',
                'image',
                'stock',
                'status'
            ]));

            $this->webTranslationService->createTranslations($product, $request);
            $this->productService->createPrice($product, $request);

            $attributeValueIds = collect($request->all())
                ->filter(function($value, $key) {
                    return str_ends_with($key, '_attribute_value_id') && !empty($value);
                })
                ->toArray();

            $this->productService->createVariant($product, $attributeValueIds,$request);

            DB::commit();
            return response()->json([
                'message' => 'Ürün başarıyla eklendi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Ürün eklenirken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Ürün eklenemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function show(int $id)
    {
        $categories = $this->categoryService->getAllCategory();
        $brands = $this->brandService->getAllBrand();
        $info = $this->productService->getProduct($id);
        $attributeValues = $this->attributeValueService->getAllAttributeValue();

        return view('backoffice.product.update', ['process_name' => self::PROCESS_NAME, 'info' => $info, 'categories' => $categories, 'brands' => $brands, 'attributeValues' => $attributeValues]);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(ProductRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $product = $this->productService->productUpdate($id, $request->only([
                'category_id',
                'brand_id',
                'display_order',
                'image',
                'stock',
                'status'
            ]));

            $this->webTranslationService->updateTranslations($product, $request);

            DB::commit();
            return response()->json([
                'message' => 'Ürün başarıyla güncellendi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Ürün güncellenirken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Ürün güncellenemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function destroy(int $id): JsonResponse
    {
        try {
            $this->productService->delete($id);

            return response()->json([
                'message' => 'Ürün başarıyla silindi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Ürün silerken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'categoryId' => $id
            ]);

            return response()->json([
                'error' => 'Ürün silinemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
