@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="col-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body table-responsive p-0">
                            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-6">
                                    <label for="name">Your Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ old('name') }}" placeholder="name">
                                    @error('name')<small id="emailHelp"
                                                         class="form-text text-danger">{{ $message }}</small>@enderror

                                </div>
                                <div class="form-group col-6">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           value="{{ old('email') }}" aria-describedby="emailHelp"
                                           placeholder="Enter email">
                                    @error('email')<small id="emailHelp"
                                                          class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Your Phone</label>
                                    <input type="tel" class="form-control" name="phone" id="tel"
                                           value="{{ old('phone') }}" aria-describedby="emailHelp"
                                           placeholder="Enter tel">
                                    @error('phone')<small id="emailHelp"
                                                          class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="position">Position select</label>
                                    <select class="form-control" name="position_id" id="position">
                                        <option selected disabled></option>
                                        @foreach($positions as $position)
                                            <option
                                                value="{{ $position->id }}" {{ $position->id == old('position_id') ? ' selected' : '' }}>{{ $position->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('position_id')<small id="emailHelp"
                                                                class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>
                                <div class="form-group mt-3">
                                    <input type="file" class="form-control-file" name="photo" id="photo"
                                           aria-describedby="emailHelp"><br>
                                    @error('photo')<small id="emailHelp"
                                                          class="form-text text-danger">{{ $message }}</small>@enderror
                                </div>

                                    <button type="submit" class="btn btn-success px-5 mt-3">Send</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
