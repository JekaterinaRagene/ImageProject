@extends('header')
<body>
<div class="container">
    <h1 class="display-4">
        <a href="{{url('/uploadfile')}}">Share Images</a>
    </h1>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <img class="card-img-top" src="/images/{{ $image->image }}" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{ $image->name }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@extends('footer');