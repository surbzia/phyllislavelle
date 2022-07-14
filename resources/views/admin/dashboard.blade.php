@extends('admin.layouts.app')

@section('content')
    <div class="card-box pd-20 mb-30">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img style="height: 100px !important" src="{{ asset('templete/vendors/images/banner-img.png') }}"
                    alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Welcome back <div class="weight-800 font-50" style="color: #036c76; font-size: 53px;">
                        {{ Auth::user()->name }}!</div>
                </h4>
            </div>
        </div>
    </div>
@endsection
