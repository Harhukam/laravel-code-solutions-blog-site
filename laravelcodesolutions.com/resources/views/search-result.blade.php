@extends('layouts.front_master')

@section('content')
    <!-- Content -->
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle"
             style="background-image:url({{ asset('images/first-visit-bg.jpg') }}); height: 70px; padding-top: 20px;">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h3 class="text-white">search results of ( {{ $keyword }} )</h3>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <!--<div class="breadcrumb-row">-->
        <!--    <div class="container">-->
        <!--        <ul class="list-inline">-->
    <!--            <li><a href="{{ url('/') }}">Home</a></li>-->
        <!--            <li>search results</li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <!-- content start -->
            <div class="container">
                <!-- Title separator style 1 -->
                <div class="p-a10 bg-white m-b40">

                    <div class="section-content">
                        @if($posts->count()>0)
                            <div class="col-lg-12 col-md-12 m-t10 m-b30 "  >

                                <ul class="list-chevron-circle orange ">
                                    @foreach($posts as $post)
                                        <li>
                                            <a href="{{ route('single', ['category' => makeSlug($post->category->category_name) ,'slug' => $post->slug]) }}"> {{ $post->title }}</a>
                                            <p><small>{{ strLimit($post->meta_description , 120) }}</small></p>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>

                        @else
                            <div class="col-lg-12 col-md-12 m-t30 m-b30 "  >
                                <ul class="list-chevron-circle orange ">
                                    <li>nothing match with  {{ $keyword }}  </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Title separator  END -->
            </div>
            <!-- content END -->
            <!-- Content END-->
        </div>
    </div>
<style>
   .list-chevron-circle li a{
        color: #1a0dab;
    }
   .list-chevron-circle li a:hover{
       color: #1a0dab;
       text-decoration-line: underline;
   }
   .list-chevron-circle li p {
       padding-bottom: 0px !important;
       margin-bottom: 0px !important;
   }
   .content-area {
       padding-top: 10px;
   }
</style>
@endsection
