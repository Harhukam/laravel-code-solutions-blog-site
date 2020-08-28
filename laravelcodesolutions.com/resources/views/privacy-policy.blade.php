@extends('layouts.front_master')

@section('title', 'Privacy Policy')
@section('meta-description', 'Privacy Policy')
@section('meta-keywords', 'Privacy Policy')
@section('og-meta-title', 'Privacy Policy')
@section('og-meta-description', 'Privacy Policy')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/Physiotherapy_banner.png') }}); height: 100px; padding-top: 25px;">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Privacy Policy</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-12 col-md-12 col-sm-12 m-b30">
                        <!-- blog start -->
                        <div class="blog-post blog-single">

                            <div class="dlab-post-text">
                                @if(isset($site['privacy_policy']))
                                    {!! $site['privacy_policy'] !!}
                                @endif

                            </div>

                        </div>

                        <!-- Left part END -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Content END-->
@endsection
