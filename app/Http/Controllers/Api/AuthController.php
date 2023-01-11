<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __invoke()
    {
      $worker = Worker::create();
        return response()->json([
            'success' => true,
            'token' => $worker->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}
