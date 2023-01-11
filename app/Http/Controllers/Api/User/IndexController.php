<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ApiGetRequest;
use App\Http\Resources\Api\MetaUsersResource;
use App\Http\Resources\Api\UsersResource;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(ApiGetRequest $request)
    {
        try {
            $data = $request->validated();
            $page = $data['page'] ?? 1;
            $count = $data['count'] ?? 6;

            $users = User::paginate($count, ['*'], 'page', $page);

            return response()->json(new MetaUsersResource($users), 200);

        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found'
            ], 404);
        }
    }



















//    public function show(User $user)
//    {
//        return view('users.show', compact('user'));
//    }
//    public function create()
//    {
//        $positions = Position::all();
//        return view('users.create', compact('positions'));
//    }
//    public function store(StoreRequest $request)
//    {
//        $data = $request->validated();
//        $image = $data['photo'];
//
//        $name = md5(Carbon::now().'_'.$image->getClientOriginalName())."_".$image->getClientOriginalExtension();
//
//        //https://image.intervention.io/v2/api/fit
//        \Intervention\Image\Facades\Image::make($image)->fit(70, 70)->save(storage_path('app/public/images/' . $name));
//        $data['photo'] = url('/storage/images/'. $name);
//        User::firstOrCreate(['email' => $data['email']], $data);
//
//        return redirect()->route('users.index');
//    }
}
