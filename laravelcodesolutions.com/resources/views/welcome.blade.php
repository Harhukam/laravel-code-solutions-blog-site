@extends('layouts.front_master')
@section('title', 'laravel Code Solutions' )
@section('description', 'laravel Code solutions')
@section('meta-keywords', 'laravel,laravel Code solutions')
@section('og-meta-title', 'laravel Code solutions')
@section('og-meta-description','laravel Code solutions')
@section('og-meta-image', asset('logo.png'))
@section('style')
 @if($sliders->count()>0)
    <link class="skin"  rel="stylesheet" type="text/css" href="{{ asset('plugins/rangeslider/rangeslider.css') }}">
    <!-- Revolution Slider Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/revolution/css/navigation.css') }}">
    @endif
@endsection
@section('content')
    @if($sliders->count()>0)
        <!-- Slider -->
        <div class="main-slider style-two default-banner">
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <div id="rev_slider_1014_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="typewriter-effect" data-source="gallery">
                        <!-- START REVOLUTION SLIDER 5.3.0.2 -->
                        <div id="rev_slider_1014_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.0.2">
                            <ul>
                                @foreach($sliders as $slide)
                                    <li data-index="rs-{{ $slide->id }}000" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="{{ asset('images/slider/'. $slide->image) }}" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ asset('images/'. $slide->image) }}" alt="{{ makeSlug($slide->title) }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina/>
                                        <!-- LAYER NR. 1 [ for overlay ] -->
                                        <div class="tp-caption tp-shape tp-shapewrapper" style="background-color: #6c757d54;"
                                             id="slide-100-layer-1"
                                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                             data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                             data-width="full"
                                             data-height="full"
                                             data-whitespace="nowrap"
                                             data-type="shape"
                                             data-basealign="slide"
                                             data-responsive_offset="off"
                                             data-responsive="off"
                                             data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
                                             data-textAlign="['left','left','left','left']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"
                                             style="z-index: 12;background-color:rgba(0, 0, 0, 0.80);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                        </div>
                                        <!-- LAYER NR. 2 [ for title ] -->
                                        <div class="tp-caption tp-resizeme"
                                             id="slide-100-layer-2"
                                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                             data-y="['top','top','top','top']" data-voffset="['110','110','200','110']"
                                             data-fontsize="['80','80','55','50']"
                                             data-lineheight="['90','90','60','60']"
                                             data-width="['800','800','800','800']"
                                             data-height="['none','none','none','none']"
                                             data-whitespace="['normal','normal','normal','normal']"
                                             data-type="text"
                                             data-responsive_offset="on"
                                             data-frames='[{"from":"y:50px(R);opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}]'
                                             data-textAlign="['center','center','center','center']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"
                                             style="z-index: 13; font-family: 'Roboto',sans-serif; white-space: normal; text-transform: capitalize; font-size: 90px; line-height: 90px; font-weight: 900; color: rgba(255, 255, 255, 1.00); border-width:0px;"> {{ $slide->title }} <br>{{ $slide->title2 }} 
                                        </div>
                                     
                                        <!-- LAYER NR. 3 [ for paragraph] -->
                                        <div class="tp-caption tp-resizeme"
                                             id="slide-100-layer-3"
                                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                             data-y="['top','top','top','top']" data-voffset="['320','250','340','250']"
                                             data-fontsize="['20','20','18','18']"
                                             data-lineheight="['30','30','30','26']"
                                             data-width="['800','800','800','400']"
                                             data-height="['none','none','none','none']"
                                             data-whitespace="['normal','normal','normal','normal']"
                                             data-type="text"
                                             data-responsive_offset="on"
                                             data-frames='[
										{"from":"y:50px(R);opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
										{"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}]'
                                             data-textAlign="['center','center','center','center']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"
                                             style="z-index: 13; font-weight: 500; color: rgba(255, 255, 255, 0.85); border-width:0px;"> <span> {{ $slide->description }}  </span>
                                        </div>
                                        <!-- LAYER NR. 4 [ for readmore botton ] -->
                                        @if($slide->btn_name!=null)
                                            <div class="tp-caption tp-resizeme"
                                                 id="slide-100-layer-4"
                                                 data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                                 data-y="['top','top','top','top']" data-voffset="['380','370','390','330']"
                                                 data-fontsize="['none','none','none','none']"
                                                 data-lineheight="['none','none','none','none']"
                                                 data-width="['700','700','700','700']"
                                                 data-height="['none','none','none','none']"
                                                 data-whitespace="['normal','normal','normal','normal']"
                                                 data-type="text"
                                                 data-responsive_offset="on"
                                                 data-frames='[
										{"from":"y:50px(R);opacity:0;","speed":1500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
										{"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}]'
                                                 data-textAlign="['center','center','center','center']"
                                                 data-paddingtop="[0,0,0,0]"
                                                 data-paddingright="[0,0,0,0]"
                                                 data-paddingbottom="[0,0,0,0]"
                                                 data-paddingleft="[0,0,0,0]"
                                                 style="z-index: 13;"><a href="{{ $slide->url }}" class="site-button button-md radius-no"> {{ $slide->btn_name }}</a>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                        </div>
                    </div>
                    <!-- END REVOLUTION SLIDER -->
                </div>
            </div>
        </div>
        <!-- Slider END -->
    @endif

 @if($posts->count()>0)
   <!-- Our Services -->
<div class="section-full bg-gray content-inner">
	<div class="container">
		<div class="section-head text-center">
			<h2 class="text-uppercase">Latest <span class="text-primary">Posts</span></h2>
		</div>
		<div class="row">
		    @foreach($posts as $post)
			<div class="col-lg-4 col-md-6 col-sm-12 m-b30">
				<div class="service-style2">
					<div class="dlab-media">
					    @if($post->image !=null)
						<img src="{{ asset('images/' . 'thumb-' . $post->image ) }}" alt="{{ $post->slug }}">
						@else
						<img src="{{ asset('images/thumb-404.jpg') }}" alt="image not available">
						@endif
						</div>
					<div class="icon-content">
						<h3 class="dlab-tilte m-b15"><a href="{{ route('single', ['category' => makeSlug($post->category->category_name) ,'slug' => $post->slug]) }}"> {{ $post->title }}</a></h3>
						<p class="m-b10">{{ strLimit($post->meta_description , 90) }}</p> <a href="{{ route('single', ['category' => makeSlug($post->category->category_name) ,'slug' => $post->slug]) }}" class="text-primary">Read More</a>
					</div>
				</div>
			</div>
			@endforeach</div>
	</div>
</div>
<!-- Our Services End -->
@endif

@endsection
@section('scripts')
 @if($sliders->count()>0)
   <script src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script> <script src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script> <script src="{{ asset('js/rev.slider.js') }}"></script> <script src="{{ asset('plugins/wow/wow.js') }}"></script> <script>jQuery(document).ready(function(){'use strict';dz_rev_slider_1();});</script>
    @endif
@endsection
