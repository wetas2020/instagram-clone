@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img class="w-100" src="/storage/{{ $post->image }}" alt="image">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img class="w-100 rounded-circle" src="/storage/{{ $post->user->profile->image }}" alt="image_profile" style="max-width: 50px;">
                </div>
                <div>
                    <div class="font-weight-bold"><a href="/profile/{{ $post->user->id}}"><span class="text-dark">{{ $post->user->username }}</a></div></span>
                </div>
                <a href="#" class="pl-3">Follow</a>
            </div>

            <hr>

            <p><span class="font-weight-bold"><a href="/profile/{{ $post->user->id}}"><span class="text-dark">{{ $post->user->username }}</a></span> {{ $post->caption }}</p></span>
        </div>
    </div>
</div>
@endsection
