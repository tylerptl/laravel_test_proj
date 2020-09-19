@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 pb-5" >
                <img class="rounded-circle" width="100%" src="{{url('img/nasa_jovian.bmp')}}">
            </div>
            <div class="col-9 pt-3">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="/p/create">add new post</a>
                </div>
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
                <div style="display: flex">
                    <div class="pr-4"><strong>{{$user->posts->count()}} </strong>posts</div>
                    <div class="pr-4"><strong>many </strong>followers</div>
                    <div class="pr-4"><strong>lots </strong>following</div>
                </div>
                <div class="font-weight-bold">{{ $user->profile->description }} </div>
                <div class="pt-4">
                    <div class="pt-4 font-weight-bold"><a href="https://github.com/tylerptl/"></a></div>
{{--                    <div>{{ Auth::user()->profile->description}} </div>--}}
                    <div><a href="{{ $user->profile->url }}" > {{ $user->profile->url }} </a></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($user->posts as $post)
                <div class="col-4">
                    <a href="/p/{{$post->id}}">
                        <img class="w-100 h-100 pt-3" src="/storage/{{ $post->image }}">
                    </a>
                </div>
            @endforeach

{{--            <div class="col-4">--}}
{{--                <img class="w-100 h-100 pt-3" src="{{url('/img/dolphin.bmp')}}">--}}
{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <img class="w-100 h-100 pt-3" src="{{url('/img/pillars.bmp')}}">--}}
{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <img class="w-100 h-100 pt-3" src="{{url('/img/mars.bmp')}}">--}}
{{--            </div>--}}
        </div>
        <div class="row">
{{--            <div class="col-4">--}}
{{--                <img class="w-100 h-100 pt-3" src="{{url('/img/butterfly_nebula.bmp')}}">--}}
{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <img class="w-100 h-100 pt-3" src="{{url('/img/EuropaJupiter_Voyager_2792.jpg')}}">--}}
{{--            </div>--}}
{{--            <div class="col-4">--}}
{{--                <img class="w-100 h-100 pt-3" src="{{url('/img/jupiterIR.bmp')}}">--}}

{{--            </div>--}}

        </div>
    </div>
    </div>
@endsection