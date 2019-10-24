@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-3 p-5">
<img src="/storage/{{$user->profile->image }}" alt=" no image yet" class=" rounded-circle w-100 ">
    </div>

    <div class="col-8 pt-5 ">
        <div class="d-flex justify-content-between align-items-baseline">
            <div class=" d-flex align-items-center pb-3">
                    <div class="h4"> {{$user->username}} </div>

                    <follow-button user-id="{{ $user->id }}" follows="$follows"></follow-button>
            </div>
            @can('update', $user->profile)
            <a href="/p/create">Add new post</a>
             @endcan

    </div>
    @can('update', $user->profile)
    <a href="/profiles/{{ $user->id }}/edit"> edit profile</a>
    @endcan


<div class="d-flex">

    <div class="pr-5"> <strong> {{ $postCount }} </strong>posts</div>
    <div class="pr-5"> <strong>{{ $followersCount }} </strong>followers</div>
    <div class="pr-5"> <strong> {{ $followingCount}}</strong> folowing</div>

</div>

<div class="pt-4 font-weight-bold"> {{$user->profile->title}}</div>

<div>  {{$user->profile->description}}</div>

<div class="">
<a href="www.linkweb.ga"> {{$user->profile->url ?? 'no url yet' }}</a></div>

</div>
</div>

<div class="row">
@foreach($user->posts as $post)   <!-- src="/storage/{{ $post->image}}" -->
<div class="col-4 pt-5">
<a href="/p/{{ $post->id }}">
    <img src="/storage/{{ $post->image}}" alt="change your browser" class=" w-100 pb-4">
</a>
</div>
@endforeach
</div>

</div>

@endsection


