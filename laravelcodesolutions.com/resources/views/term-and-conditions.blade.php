@extends('layouts.front_master')

@section('title', 'Term and Conditions')
@section('meta-description', 'Term and Conditions')
@section('meta-keywords', 'Term and Conditions')
@section('og-meta-title', 'Term and Conditions')
@section('og-meta-description', 'Term and Conditions')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/Physiotherapy_banner.png') }}); height: 100px; padding-top: 25px;">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">Term and Conditions</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Term and Conditions</li>
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
                                @if(isset($site['term_and_conditions']))
                                    {!! $site['term_and_conditions'] !!}
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
