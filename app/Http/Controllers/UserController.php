<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\Position;
use App\Models\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(6);
        return view('users.index', compact('users'));
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function create()
    {
        $positions = Position::all();
        return view('users.create', compact('positions'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $image = $data['photo'];

        $name = md5(Carbon::now().'_'.$image->getClientOriginalName())."_".$image->getClientOriginalExtension();

        //https://image.intervention.io/v2/api/fit
        //center crop as default
        Image::make($image)->fit(70, 70)->save(storage_path('app/public/images/' . $name));
        $data['photo'] = url('/storage/images/'. $name);
        User::firstOrCreate(['email' => $data['email']], $data);

        return redirect()->route('users.index');
    }
}
