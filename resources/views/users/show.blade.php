@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-6 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cart of the new {{ $user->name }} user</h3>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to list</a>
                            <div class="card-body table-responsive p-0">
                                <div class="card w-50 m-auto">
                                    <img src="{{ $user->photo }}" alt="User photo" >
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $user->name }}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush ">
                                        <li class="list-group-item text-primary">Email - {{ $user->email}}</li>
                                        <li class="list-group-item text-primary">Phone - {{ $user->phone }}</li>
                                        <li class="list-group-item text-primary">Position - {{ $user->positions->title }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
