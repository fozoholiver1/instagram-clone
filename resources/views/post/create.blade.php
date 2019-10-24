@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="/p" enctype="multipart/form-data">
       <div class="row">
           <div class="col-8 offset-2">
                @csrf
                <div class="row">
                        <h1> Add New Post</h1>
                </div>

                <div class="form-group row">
                    <label for="caption" class=" col-form-label "> post caption</label>


                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
                        name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="form-group row">
                        <label for="image" class=" pt-3 col-form-label "> post image</label>


                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror"
                            name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>

                            @error('image')

                                    <strong>{{ $message }}</strong>

                            @enderror

                    </div>

                    <div class="row pt-3">
                        <button class="btn btn-primary" type="submit" name="post"> add new post</button>
                    </div>
           </div>

        </div>
    </form>
</div>

@endsection


