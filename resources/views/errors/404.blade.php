@extends('layouts.app')
@section('title', '404 Page')

@section('content')


<div class="page-title parallax-style parallax1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h2>404 - Page Not Found</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="flat-wrapper">
                <div class="breadcrumbs">
                    <h2 class="trail-browse">You are here:</h2>
                    <ul class="trail-items">
                        <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                        <li>404 Not Found</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="flat-row">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="flat-404">
                    <div class="heading-404">
                        <img src="{{asset('public/assets/images/404.png')}}" alt="images">
                    </div>
                    <div class="content-404">
                        <h3>Looks Like Something Went Wrong!</h3>
                        <p>The page you were looking for is not here. Maybe you want to perform a search?</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-style')

@endsection

@section('page-script')

@endsection
