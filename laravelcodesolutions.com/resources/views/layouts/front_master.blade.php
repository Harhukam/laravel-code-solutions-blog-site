<!DOCTYPE html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>@yield('title')</title><meta name="description" content="@yield('description')" /><meta name="keywords" content="@yield('meta-keywords')" /><meta property="og:title" content="@yield('og-meta-title')" /><meta property="og:description" content="@yield('og-meta-description')" /><meta property="og:image" content="@yield('og-meta-image')" /><meta name="author" content="My Web Deal" /><meta name="robots" content="" /><meta name="format-detection" content="telephone=no"><link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" /><meta name="csrf-token" content="{{ csrf_token() }}"><link rel="stylesheet" type="text/css" href="{{ asset('css/style.min.css') }}"><link rel="stylesheet" type="text/css" href="{{ asset('css/templete.min.css') }}"><link class="skin" rel="stylesheet" type="text/css" href="{{ asset('css/skin/skin-3.css') }}"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> @yield('style') <style type="text/css">


<style>
 code {
    word-break: break-word;
    white-space: pre-wrap;
    line-height: 1.42857143 !important;
}
 code {
    display: block;
    padding: 9.5px;
    margin: 0 0 10px;
    font-size: 13px;
    line-height: 1.42857143;
    word-break: break-all;
    word-wrap: break-word;
    color: #333333;
    background-color: #f5f5f5;
    border: 1px solid #cccccc;
    border-radius: 4px;
}
 pre {
    word-break: break-word;
    white-space: pre-wrap;
    line-height: 1.42857143 !important;
}
 pre {
    display: block;
    padding: 9.5px;
    margin: 0 0 10px;
    font-size: 13px;
    line-height: 1.42857143;
    word-break: break-all;
    word-wrap: break-word;
    color: #333333;
    background-color: #f5f5f5;
    border: 1px solid #cccccc;
    border-radius: 4px;
}

</style>


</head><body id="bg"><div id="loading-area" class="loader2"></div><div class="page-wraper"> <header class="site-header header header-style-7"><div class="top-bar no-skew"><div class="container"><div class="row d-flex justify-content-between"><div class="dlab-topbar-left topbar-info"><ul class="text-center"></ul></div><div class="dlab-topbar-right d-flex"><ul class="social-bx list-inline pull-right align-self-center"> @auth<li><a title="Back to Dashboard" href="{{ route('home') }}" class="fa fa-home"></a></li><li><a title="Logout" href="{{ route('logout') }}" class="fa fa-power-off"></a></li> @endauth<li><a href="javascript:void(0);" class="fa fa-facebook"></a></li><li><a href="javascript:void(0);" class="fa fa-twitter"></a></li><li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li><li><a href="javascript:void(0);" class="fa fa-google-plus"></a></li> @guest<li> <a title="Login" href="{{ route('login') }}" class="fa fa-user"></a></li> @endguest</ul></div></div></div></div><div class="sticky-header main-bar-wraper navbar-expand-lg"><div class="main-bar clearfix "><div class="container-fluid clearfix"><div class="logo-header mostion logo-black"> <a href="{{ url('/') }}"> <img src="{{ asset('logo.png') }}" width="193" height="89" alt="logo"> </a></div> <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span></span> <span></span> <span></span> </button><div class="extra-nav"><div class="extra-cell"> <a href="javascript:void(0);" id="quik-search-btn" class="search-btn"><i class="fa fa-search"></i></a></div></div><div class="dlab-quik-search bg-primary"> {{ Form::open(['url' => route('front.search'), 'method' => 'get', 'autocomplete' => 'off' ]) }} {{ Form::text('keyword', (isset($keyword)) ? $keyword : null, ['placeholder' => 'Search....', 'class' => 'form-control']) }} <span id="quik-search-remove"><i class="fa fa-remove"></i></span> {{ Form::close() }}</div><div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown"><ul class="nav navbar-nav"><li class="active"><a href="{{ url('/') }}">Latest</a></li> @php $menus = getMenuCategories(); @endphp @if(count($menus) > 0) @foreach($menus as $menu) @if(isset($menu['children']) && is_array($menu['children']) && count($menu['children']) > 0)<li> <a href="javascript:void(0)">{{ $menu['category_name'] }}<i class="fa fa-chevron-down"></i></a> @else<li> <a href="{{ route('post-list', ['slug' => $menu['slug']]) }}">{{ $menu['category_name'] }}</a> @endif @if(isset($menu['children']) && is_array($menu['children']) && count($menu['children']) > 0)<ul class="sub-menu"> @foreach($menu['children'] as $child)<li class="menu-item"><a href="{{ route('post-list', ['slug' => $child['slug']]) }}">{{ $child['category_name'] }}</a></li> @endforeach</ul> @endif</li> @endforeach @endif</ul></div></div></div></div> </header><div class="page-content bg-white"> @yield('content')</div> <footer class="site-footer "> {{--<div class="footer-top"><div class="container"><div class="row"><div class="col-lg-3 col-md-6 col-sm-6 footer-col-4"><div class="widget widget_about" ><div class="logo-footer" style="background-color: #fff;"><img src="{{ asset('logo.png') }}" alt="logo"></div><p><strong>Auto Care</strong> ipsum dolor sit amet, consectetuer adipiscing elit.</p><ul class="dlab-social-icon dez-border"><li><a class="fa fa-facebook" href="javascript:void(0);"></a></li><li><a class="fa fa-twitter" href="javascript:void(0);"></a></li><li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li></ul></div></div><div class="col-lg-3 col-md-6 col-sm-6 footer-col-4"><div class="widget widget_services"><h4 class="m-b15 text-uppercase">Useful links</h4><div class="dlab-separator-outer m-b10"><div class="dlab-separator bg-white style-skew"></div></div><ul><li><a href="#">Engine Diagnostics</a></li><li><a href="#">Belts and Hoses</a></li><li><a href="#">Air Conditioning</a></li></ul></div></div><div class="col-lg-3 col-md-6 col-sm-6 footer-col-4"><div class="widget widget_services"><h4 class="m-b15 text-uppercase">Our services</h4><div class="dlab-separator-outer m-b10"><div class="dlab-separator bg-white style-skew"></div></div><ul><li><a href="#">Engine Diagnostics</a></li><li><a href="#">Lube, Oil and Filters</a></li><li><a href="#">Belts and Hoses</a></li></ul></div></div><div class="col-lg-3 col-md-6 col-sm-6 footer-col-4"><div class="widget widget_getintuch"><h4 class="m-b15 text-uppercase">Contact us</h4><div class="dlab-separator-outer m-b10"><div class="dlab-separator bg-white style-skew"></div></div><ul><li><i class="ti-location-pin"></i><strong>address</strong> xxxxxxxxxxxxxxxxxx xxxxxx <br> xxxxxx</li><li><i class="ti-mobile"></i><strong>phone</strong> 9463710716</li></ul></div></div></div></div></div>--}}<div class="footer-bottom"><div class="container"><div class="row"><div class="col-lg-4 col-md-4 text-left"> <span>© Copyright 2020 - Laravel Code Solutions.</span></div><div class="col-lg-4 col-md-4 text-center"> <span> Developed <i class="ti-heart text-primary heart"></i> By My Web Deal. </span></div><div class="col-lg-4 col-md-4 text-right"> <a href="{{ route('privacy.policy') }}"> Privacy Policy</a> <a href="{{ route('faq') }}"> FAQs</a> <a href="{{ route('term.and.conditions') }}"> Term & Conditions</a></div></div></div></div> </footer> <button class="scroltop fa fa-arrow-up style4" ></button></div> <script src="{{ asset('js/jquery.min.js') }}"></script> <script src="{{ asset('plugins/bootstrap/js/popper.min.js') }}"></script> <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script> <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script> <script src="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script> <script src="{{ asset('plugins/magnific-popup/magnific-popup.js') }}"></script> <script src="{{ asset('plugins/counter/waypoints-min.js') }}"></script> <script src="{{ asset('plugins/counter/counterup.min.js') }}"></script> <script src="{{ asset('plugins/imagesloaded/imagesloaded.js') }}"></script> <script src="{{ asset('plugins/masonry/masonry-3.1.4.js') }}"></script> <script src="{{ asset('plugins/masonry/masonry.filter.js') }}"></script> <script src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script> <script src="{{ asset('plugins/rangeslider/rangeslider.js') }}" ></script> <script src="{{ asset('js/custom.min.js') }}"></script>@yield('scripts')</body></html>