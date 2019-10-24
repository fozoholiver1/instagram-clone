@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-8">
        <img src="/storage/{{ $post->image }}" alt="" class="w-100">
    </div>
    <div class="col-4">
       <div class=" pr-4 d-flex">
            <div>
                    <img src="/storage/{{ $post->user->profile->image}}" alt="" class="rounded-circle w-100  " style=" max-width:100px;">
                </div>
                <div>
                    <div class="align-items-center font-weight-bold pr-2">
                        <a href="/profiles/{{ $post->user->id }}">
                            <span class=" text-dark">{{ $post->user->username }}
                            </span>
                        </a>
                       | <a href="#" class="pl-3">follow</a>
                    </div>
                   </div>
       </div> <hr>
        <p><span class=" font-weight-bold"><a href="/profiles/{{ $post->user->id }}">
            <span class=" text-dark">{{ $post->user->username }}</span></a></span>{{ $post->caption }}</p>
      </div>

</div>
</div>

@endsection


