@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 pb-5" >
                <img class="rounded-circle" width="100%" src="img/nasa_jovian.bmp">
            </div>
            <div class="col-9 pt-3">
                <div><h1>{{ Auth::user()->username }}</h1></div>
                <div style="display: flex">
                    <div class="pr-4"><strong>few </strong>posts</div>
                    <div class="pr-4"><strong>many </strong>followers</div>
                    <div class="pr-4"><strong>lots </strong>following</div>
                </div>
                <div >So it goes.</div>
                <div class="pt-4">
                    <div class="pt-4 font-weight-bold"><a href="https://github.com/tylerptl/">@tylerptl</a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="w-100 h-100 pt-3" src="img/dolphin.bmp">
            </div>
            <div class="col-4">
                <img class="w-100 h-100 pt-3" src="img/pillars.bmp">
            </div>
            <div class="col-4">
                <img class="w-100 h-100 pt-3" src="img/mars.bmp">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="w-100 h-100 pt-3" src="img/butterfly_nebula.bmp">
            </div>
            <div class="col-4">
                <img class="w-100 h-100 pt-3" src="img/EuropaJupiter_Voyager_2792.jpg">
            </div>
            <div class="col-4">
                <img class="w-100 h-100 pt-3" src="img/jupiterIR.bmp">

            </div>

        </div>
    </div>
    </div>
@endsection
