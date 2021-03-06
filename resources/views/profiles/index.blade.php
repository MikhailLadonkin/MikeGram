@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4 p-5">
            <img class="rounded-circle w-100" src="{{$user->profile->profileImage()}}">
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="mr-4">{{$user -> username}}</h4>
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
                @can('update', $user->profile)
                    <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user -> id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{$postsCount}}</strong> posts</div>
                <div class="pr-5"><strong>{{$followersCount}}</strong> followers</div>
                <div class="pr-5"><strong>{{$followingCount}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user -> profile -> title}}</div>
            <div>{{$user -> profile -> description}}</div>
            <a href="#">{{$user -> profile -> url ?? 'n/a'}}</a>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 p-4">
            <a href="/p/{{$post->id}}">
                <img class="w-100" src="/storage/{{$post->image}}">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
