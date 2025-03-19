<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use App\Services\AttributeValueService;
use App\Services\WebTranslationService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\DataTables;

class AttributeValueController extends Controller
{
    protected AttributeValueService $attributeValueService;
    protected WebTranslationService $webTranslationService;
    const PROCESS_NAME = 'attribute-value';
    const REDIS_LIST_KEY = 'attributes_values_list';

    /**
     * @param AttributeValueService $attributeValueService
     * @param WebTranslationService $webTranslationService
     */
    public function __construct(AttributeValueService $attributeValueService, WebTranslationService $webTranslationService)
    {
        $this->attributeValueService = $attributeValueService;
        $this->webTranslationService = $webTranslationService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $attributeValues = $this->attributeValueService->getAllAttributeValue();
        return view('backoffice.attributeValue.index', ['process_name' => self::PROCESS_NAME, 'attributeValues' => $attributeValues]);
    }

    /**
     * @return JsonResponse
     * @throws Exception
     */
    public function datatable(): JsonResponse
    {
        $attributeValues = $this->attributeValueService->getAllAttributeValueData();

        return DataTables::of($attributeValues)
            ->addColumn('status', function ($attributeValue) {
                return $attributeValue->status == 1
                    ? '<span class="badge bg-label-primary me-1">Aktif</span>'
                    : '<span class="badge bg-label-danger me-1">Pasif</span>';
            })
            ->addColumn('name', function ($attributeValue) {
                return $attributeValue->name ?? '';
            })
            ->addColumn('actions', function ($attributeValue) {
                return "
                <button class='dropdown-item waves-effect edit-brand' onclick='openAttributeValueModal($attributeValue->id)' data-id='$attributeValue->id'><i class='ti ti-pencil me-1'></i> Güncelle</button>
                <a class='dropdown-item waves-effect' type='button' onclick='attributeValueDelete($attributeValue->id)'><i class='ti ti-trash me-1'></i> Sil</a>
            ";
            })
            ->rawColumns(['status', 'actions'])
            ->make(true);
    }


    /**
     * @return View
     */
    public function create(): View
    {
        return view('backoffice.attributeValue.create', ['process_name' => self::PROCESS_NAME]);
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $attributeValue = $this->attributeValueService->attributeValueCreate($request->only([
                'attribute_id',
                'extra',
                'display_order',
                'status'
            ]));

            $this->webTranslationService->createTranslations($attributeValue, $request);

            DB::commit();
            Redis::del(self::REDIS_LIST_KEY);
            return response()->json([
                'message' => 'Özellik başarıyla eklendi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Özellik eklenirken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Özellik eklenemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @param string $id
     * @return array
     */
    public function show(string $id): array
    {
        return $this->attributeValueService->getAttributeValue($id);
    }


    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            DB::beginTransaction();

            $attributeValue = $this->attributeValueService->attributeValueUpdate($id, $request->only([
                'attribute_id',
                'extra',
                'display_order',
                'status'
            ]));

            $this->webTranslationService->updateTranslations($attributeValue, $request);

            DB::commit();
            Redis::del(self::REDIS_LIST_KEY);
            return response()->json([
                'message' => 'Özellik başarıyla güncellendi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Özellik güncellenirken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return response()->json([
                'error' => 'Özellik güncellenemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->attributeValueService->delete($id);
            Redis::del(self::REDIS_LIST_KEY);

            return response()->json([
                'message' => 'Özellik başarıyla silindi!'
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Özellik silerken hata oluştu: ', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'categoryId' => $id
            ]);

            return response()->json([
                'error' => 'Özellik silinemedi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @param $attributeId
     * @return JsonResponse
     */
    public function getAttributeValues($attributeId): JsonResponse
    {
        $values = $this->attributeValueService->getAttributeValue($attributeId);
        return response()->json($values);
    }
}
