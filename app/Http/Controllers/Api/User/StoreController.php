<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ApiStoreRequest;
use App\Models\User;
use Illuminate\Support\Carbon;

class StoreController extends Controller
{
    public function __invoke(ApiStoreRequest $request)
    {
        try {
            $data = $request->validated();
            $image = $data['photo'];

            $name = md5(Carbon::now().'_'.$image->getClientOriginalName())."_".$image->getClientOriginalExtension();

            \Intervention\Image\Facades\Image::make($image)->fit(70, 70)->save(storage_path('app/public/images/' . $name));
            $data['photo'] = url('/storage/images/'. $name);
            $user = User::where('email', $data['email'])->first();
            if ($user) return response([
                'success' => false,
                'message' => 'User with this phone or email already exist'
            ], 403);

            $user = User::create($data);

            return response()->json([
                'success' => true,
                'user_id' => $user->id,
                'message' => "New user successfully registered"
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => 'Page not found'
            ], 404);
        }
    }
}
