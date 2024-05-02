<?php

namespace App\Http\Controllers;
use Redirect;

use App\Services\RecommendationService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class RecommendationController extends BaseController
{
    protected $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function getRecommendations(Request $request, int $userId)
    {
        // Validate request parameters
        $validator = Validator::make($request->all(), [
            'userId' => 'required|integer|exists:users,id',
        ]);

        $recommendations = $this->recommendationService->getRecommendations($userId);

        return response()->json(['recommendations' => $recommendations]);
    }
}