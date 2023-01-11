<?php

namespace App\Http\Controllers\Api\Position;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PositionsResource;
use App\Models\Position;

class IndexController extends Controller
{
    public function __invoke()
    {
        try {
            $positions = Position::all();
            if (count($positions) == 0)
                return response()->json([
                    'success' => false,
                    'message' => 'Positions not found'
                ], 422);

                return response()->json([
                    'success' => true,
                    'positions' => PositionsResource::collection($positions),
                ], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found'
            ], 404);
        }

    }
}
