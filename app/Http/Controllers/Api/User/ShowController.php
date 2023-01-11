<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ShowUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShowController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $request->merge(['user_id' => $request->route('id')]);
        $validateId = Validator::make($request->all(),
        [
            'user_id' => 'integer|min:1',
        ]);

        if($validateId->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'fails' => $validateId->errors()
            ], 400);
        }

        $user = User::where('id', $id)->first();

        if ($user == null){
            return response()->json([
                'success' => false,
                'message' => 'The user with the requested identifier does not exist',
                'fails' => [
                    'user_id' => [
                        'User not found',
                    ]
                ],
            ], 404);
        }
        return response()->json(new ShowUserResource($user), 200);
    }
}
