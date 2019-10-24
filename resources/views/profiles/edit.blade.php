@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="/profiles/{{ $user->id }}" enctype="multipart/form-data">
       <div class="row">
           <div class="col-8 offset-2">
                @csrf
                @method('PATCH')
                <div class="row">
                        <h1> Edit Your profile</h1>
                </div>

                <div class="form-group row">
                    <label for="title" class=" col-form-label "> profile title</label>


                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                        name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="form-group row">
                    <label for="description" class=" col-form-label "> profile description</label>


                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ old('description') ?? $user->profile->description }}"  autocomplete="description" autofocus>

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="form-group row">
                    <label for="url" class=" col-form-label "> profile url</label>


                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                        name="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>

                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="form-group row">
                        <label for="image" class=" pt-3 col-form-label "> profile image</label>


                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror"
                            name="image" value="{{ old('image')}}"  autocomplete="image" autofocus>

                            @error('image')

                                    <strong>{{ $message }}</strong>

                            @enderror

                    </div>

                    <div class="row pt-3">
                        <button class="btn btn-primary" type="submit" name="post"> update profile</button>
                    </div>
           </div>

        </div>
    </form>
</div>

@endsection


