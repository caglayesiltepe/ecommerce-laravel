<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Services\BrandService;
use App\Services\WebTranslationService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    protected BrandService $brandService;
    protected WebTranslationService $webTranslationService;
    const PROCESS_NAME = 'brand';
    const REDIS_LIST_KEY = 'brands_list';

    public function __construct(BrandService $brandService,WebTranslationService $webTranslationService)
    {
        $this->brandService = $brandService;
        $this->webTranslationService = $webTranslationService;
    }

    public function index(): View
    {
        return view('backoffice.brand.index', ['process_name' => self::PROCESS_NAME]);
    }

    public function datatable(): JsonResponse
    {
        $brands = $this->brandService->getAllBrandData();

        return DataTables::of($brands)
            ->addColumn('logo', function ($brand) {
                if(!empty($brand->logo)){
                    $logo = asset('storage/'. $brand->logo);
                    return "<img src='$logo' style='width:50px;height:50px;'>";
                }
                return '';
            })
            ->addColumn('status', function ($brand) {
                return $brand->status == 1
                    ? '<span class="badge bg-label-primary me-1">Aktif</span>'
                    : '<span class="badge bg-label-danger me-1">Pasif</span>';
            })
            ->addColumn('name', function ($brand) {
                return $brand->name ?? '';
            })
            ->addColumn('actions', function ($brand) {
                return "
                <button class='dropdown-item waves-effect edit-brand' onclick='openBrandModal($brand->id)' data-id='$brand->id'><i class='ti ti-pencil me-1'></i> Güncelle</button>
                <a class='dropdown-item waves-effect' type='button' onclick='brandDelete($brand->id)'><i class='ti ti-trash me-1'></i> Sil</a>
            ";
            })
            ->rawColumns(['logo', 'status', 'actions'])
            ->make(true);
    }


    public function create(): View
    {
        return view('backoffice.brand.create', ['process_name' => self::PROCESS_NAME]);
    }


    public function store(BrandRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $brand = $this->brandService->brandCreate($request->only([
                'logo',
                'display_order',
                'status'
            ]));

            $this->webTranslationService->createTranslations($brand, $request);

            DB::commit();
            Redis::del(self::REDIS_LIST_KEY);
            return response()->json([
                'message' => 'Marka başarıyla eklendi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Marka eklenirken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Marka eklenemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function show(int $id)
    {
        return $this->brandService->getBrand($id);
    }

    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $brand = $this->brandService->brandUpdate($id, $request->only([
                'display_order',
                'logo',
                'status'
            ]));

            $this->webTranslationService->updateTranslations($brand, $request);

            DB::commit();
            Redis::del(self::REDIS_LIST_KEY);
            return response()->json([
                'message' => 'Marka başarıyla güncellendi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Marka güncellenirken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Marka güncellenemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function destroy(int $id): JsonResponse
    {
        try {
            $this->brandService->delete($id);
            Redis::del(self::REDIS_LIST_KEY);

            return response()->json([
                'message' => 'Marka başarıyla silindi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Marka silerken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'categoryId' => $id
            ]);

            return response()->json([
                'error' => 'Marka silinemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
