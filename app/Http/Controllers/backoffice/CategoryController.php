<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use App\Services\WebTranslationService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;
    protected WebTranslationService $webTranslationService;
    const PROCESS_NAME = 'category';
    const REDIS_LIST_KEY = 'categories_list';

    public function __construct(CategoryService $categoryService,WebTranslationService $webTranslationService)
    {
        $this->categoryService = $categoryService;
        $this->webTranslationService = $webTranslationService;
    }

    public function index(): View
    {
        return view('backoffice.category.index', ['process_name' => self::PROCESS_NAME]);
    }

    public function datatable(): JsonResponse
    {
        $categories = $this->categoryService->getAllCategoryData();

        return DataTables::of($categories)
            ->addColumn('slug', function ($category) {
                //return "<a href='".route('category.show', ['slug' => $category->slug])."'>$category->slug</a>";
                return "<a href='#'>$category->slug</a>";
            })
            ->addColumn('status', function ($category) {
                return $category->status == 1
                    ? '<span class="badge bg-label-primary me-1">Aktif</span>'
                    : '<span class="badge bg-label-danger me-1">Pasif</span>';
            })
            ->addColumn('name', function ($category) {
                return $category->name ?? '';
            })
            ->addColumn('actions', function ($category) {
                return "
                <a class='dropdown-item waves-effect' href='" . route('backoffice.category.show', $category->id) . "'><i class='ti ti-pencil me-1'></i> Güncelle</a>
                <a class='dropdown-item waves-effect' type='button' onclick='categoryDelete($category->id)'><i class='ti ti-trash me-1'></i> Sil</a>
            ";
            })
            ->rawColumns(['slug', 'status', 'actions'])
            ->make(true);
    }


    public function create(): View
    {
        $categories = $this->categoryService->getAllCategory();
        return view('backoffice.category.create', ['process_name' => self::PROCESS_NAME, 'categories' => $categories]);

    }


    public function store(CategoryRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $category = $this->categoryService->categoryCreate($request->only([
                'parent_id',
                'display_order',
                'image',
                'small_image',
                'icon',
                'status'
            ]));

            $this->webTranslationService->createTranslations($category, $request);

            DB::commit();
            Redis::del(self::REDIS_LIST_KEY);
            return response()->json([
                'message' => 'Kategori başarıyla eklendi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Kategori eklenirken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Kategori eklenemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function show(int $id)
    {
        $categories = $this->categoryService->getAllCategory();
        $info = $this->categoryService->getCategory($id);
        return view('backoffice.category.update', ['process_name' => self::PROCESS_NAME, 'info' => $info, 'categories' => $categories]);
    }

    public function update(CategoryRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $category = $this->categoryService->categoryUpdate($id, $request->only([
                'parent_id',
                'display_order',
                'image',
                'small_image',
                'icon',
                'status'
            ]));

            $this->webTranslationService->updateTranslations($category, $request);

            DB::commit();
            Redis::del(self::REDIS_LIST_KEY);
            return response()->json([
                'message' => 'Kategori başarıyla güncellendi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Kategori güncellenirken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Kategori güncellenemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function destroy(int $id): JsonResponse
    {
        try {
            $this->categoryService->delete($id);
            Redis::del(self::REDIS_LIST_KEY);

            return response()->json([
                'message' => 'Kategori başarıyla silindi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Kategori silerken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'categoryId' => $id
            ]);

            return response()->json([
                'error' => 'Kategori silinemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
