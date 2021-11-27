@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img class="rounded-circle " src="/svg/profile_image.jpg" alt="profile_image">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>
                <a href="/post/create">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>207</strong> followers</div>
                <div class="pr-5"><strong>1,248</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
       @foreach ($user->posts as $post)
        <div class="col-4 pb-4">
            <img class="w-100" src="/storage/{{ $post->image }}" alt="unsplash image">
        </div>
       @endforeach


    </div>
</div>
@endsection
