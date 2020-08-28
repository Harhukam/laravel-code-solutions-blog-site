@extends('layouts.front_master')
@section('title', "$single[title] ")
@section('description', "$single[meta_description] ")
@section('meta-keywords', "$single[title] ")
@section('og-meta-title', "$single[title] ")
@section('og-meta-description', "$single[meta_description] ")
@section('og-meta-image', asset('images/'.$single['image']))
@section('style')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f22eb5bc2347e0014153aae&product=sop' async='async'></script>
<style> .breadcrumb-row ul li {  padding: 0; margin-right: 3px; font-size: 14px; color: #333; display: inline;} 
@media only screen and (max-width:591px)
.dlab-bnr-inr .dlab-bnr-inr-entry h1 {
    font-size: 22px !important;
    margin-bottom: 15px;
}
</style>
@endsection
@section('content')
 
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
     
       <div class="dlab-bnr-inr overlay-black-middle" style="background: rgb(34 34 34 / 42%); height: 150px; padding-top: 25px;">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white" style="font-size: 22px !important;">{{ $single['title']  }}</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
       <!-- <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>{{ $single['title'] }}</li>
                </ul>
            </div>
        </div>-->
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-9 col-md-7 col-sm-12 m-b30">
                        <!-- blog start -->
                        <div class="blog-post blog-single">
                         {{--   <div class="dlab-post-title ">
                                <h1 class="post-title">{{ $single['title'] }}</h1>
                            </div>--}}

                            @if(isset($single['image']))
                                <br>
                                <div class="dlab-post-media dlab-img-effect ">
                                  
                                              @if($single['image'] !=null)
                            <img style="max-height:430px;" src="{{ asset('images/' . $single['image']) }}"
                                         alt="{{ makeSlug($single['title']) }}" title="{{ $single['title'] }}" >
                            @else
                            <img src="{{ asset('images/thumb-404.jpg') }}" alt="image not available">
                            @endif
                                </div>
                            @endif

                            <div class="dlab-post-text">
                                {!! $single['body'] !!}
                                
                                  @if($single->disclaimer !=null)
                                <div class="jumbotron">
                                   <h5>Disclaimer:</h5>
                                {!! $single['disclaimer']!!}
                                </div>
                                @endif
                                
                            </div>
                            <div class="dlab-post-tags clear">
                             Share :     <!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                             <div style="padding-top:50px;">
                                 
 
                             </div>
                                <!--<div class="post-tags"> <a href="#">Child </a> <a href="#">Eduction </a> <a href="#">Money </a> <a href="#">Resturent </a> </div>-->
                            </div>
                        </div>
                       <!-- <div class="clear" id="comment-list">
                            <div class="comments-area" id="comments">
                                <div class="dlab-divider bg-gray-dark"><i class="icon-dot c-square"></i></div>
                                <div class="share-details-btn">
                                    <ul>
                                        <li><h5 class="m-a0">Share Post</h5></li>
                                       <li><a href="#" class="site-button facebook button-sm"><i class="fa fa-facebook"></i> Facebook</a></li>
                                        <li><a href="#" class="site-button google-plus button-sm"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                                        <li><a href="#" class="site-button linkedin button-sm"><i class="fa fa-linkedin"></i> Linkedin</a></li>
                                        <li><a href="#" class="site-button instagram button-sm"><i class="fa fa-instagram"></i> Instagram</a></li>
                                        <li><a href="#" class="site-button twitter button-sm"><i class="fa fa-twitter"></i> Twitter</a></li>
                                        <li><a href="#" class="site-button whatsapp button-sm"><i class="fa fa-whatsapp"></i> Whatsapp</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>-->
                        <!-- blog END -->
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-3 col-md-5 col-sm-12">
                        <aside  class="side-bar">
                            <div class="widget">
                                <h4 class="widget-title">Search</h4>
                                <div class="search-bx">
                                    {{ Form::open(['url' => route('front.search'), 'method' => 'get', 'autocomplete' => 'off' ]) }}

                                    <div class="input-group">
                                        {{ Form::text('keyword', (isset($keyword)) ? $keyword : null, ['placeholder' => 'Search....', 'class' => 'form-control']) }}
                                        <span class="input-group-btn">
                                            <button type="submit" class="site-button"><i class="fa fa-search"></i></button>
                                            </span> </div>
                                    {{ Form::close() }}
                                </div>
                            </div>

                            @if($categories->count() > 0)
                            <div class="widget widget_categories">
                                <h4 class="widget-title">Categories List</h4>
                                <ul>
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('post-list', ['slug' => $category->slug ]) }}">{{ $category->category_name }}</a> ({{ postCount($category->id) }})</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                        </aside>
                    </div>
                    <!-- Side bar END -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->
  
@endsection
