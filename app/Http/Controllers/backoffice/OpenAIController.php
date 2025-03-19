<?php

namespace App\Http\Controllers\backoffice;
use App\Http\Controllers\Controller;
use App\Services\OpenAIService;
use Exception;
use Illuminate\Http\Request;

class OpenAIController extends Controller
{
    protected OpenAIService $service;
    public function __construct(OpenAIService $service){
        $this->service = $service;
    }

    public function webTranslationSend(Request $request)
    {
        try {
            $trName = $request->input('tr_name');
            $model = $request->input('model');

            $response = $this->service->webTranslationSend($trName,$model);

            return response()->json($response);
        } catch (Exception $e) {
            dd($e->getMessage());
            return response()->json([
                'error' => 'OpenAI HATA',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
