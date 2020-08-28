@extends('layouts.front_master')
@section('title', 'laravel Code Solutions' )
@section('description', 'laravel Code solutions')
@section('meta-keywords', 'laravel,laravel Code solutions')
@section('og-meta-title', 'laravel Code solutions')
@section('og-meta-description','laravel Code solutions')
@section('og-meta-image', asset('logo.png'))
@section('content')
    <!-- Content -->
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle"
             style="background-image:url({{ asset('images/first-visit-bg.jpg') }}); height: 100px; padding-top: 25px;">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white">{{ trimStr5(ucfirst(unSlug($categorySlug))) }}</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Post List</li>
                    <li>{{ trimStr5(ucfirst(unSlug($categorySlug))) }}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->


    @if($posts->count()>0)
        <!-- Our Services -->
            <div class="section-full bg-gray content-inner">
                <div class="container">
                    <!--<div class="section-head text-center">
                        <h2 class="text-uppercase">titile<span class="text-primary"> </span></h2>
                    </div>-->
                    <div class="row">

                        @foreach($posts as $post)
                            <div class="col-lg-4 col-md-6 col-sm-12 m-b30">
                                <div class="service-style2">
                                    <div class="dlab-media dlab-img-effect zoom ">
                                  <a href="{{ route('single', ['category' => makeSlug($post->category->category_name) ,'slug' => $post->slug]) }}"> 
                                      
                                       @if($post->image !=null)
                           <img src="{{ asset('images/' .$post->image ) }}" alt="{{ $post->slug }}" title="{{ $post->title }}">
                            @else
                            <img src="{{ asset('images/thumb-404.jpg') }}" alt="image not available">
                            @endif
                                     </a>
                                    </div>
                                    <div class="icon-content">
                                        <h3 class="dlab-tilte m-b15 text-center text-capitalize">
                                            <a href="{{ route('single', ['category' => makeSlug($post->category->category_name) ,'slug' => $post->slug]) }}"> {{ $post->title }} </a> 
                                        </h3>
                                        <p class="m-b10"> {{ strLimit($post->meta_description , 64) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
            <!-- Our Services End -->
        @else
            <p class="text-center"> No data found related  <b> {{ trimStr5(ucfirst(unSlug($categorySlug))) }} </b></p>
    @endif


    <!-- Content END-->
    </div>
    </div>

@endsection
