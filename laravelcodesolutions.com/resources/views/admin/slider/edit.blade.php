@extends('layouts.master')
@section('title', 'Add New Slide')
@section('parentPageTitle', 'Slider')
@section('page-style')
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
@stop
@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('flash.ajax-hsk-flash')

            {!! Form::open([
'route'        => ['slider.update', 'slider' => $slider->id],
'method'       => 'PATCH',
'autocomplete' => 'off',
'id'           => 'ajax-form-hsk',
'files'        => 'true',
'redirectTo'   => route('slider.index'),
]) !!}

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        {{ Form::text('title', $slider->title, ['class' => 'form-control' , 'placeholder'=>'Enter Title']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('title2', $slider->title2, ['class' => 'form-control' , 'placeholder'=>'Enter Title Two']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::textarea('description', $slider->description, ['class' => 'form-control' , 'placeholder'=>'Enter Description']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('btn_name', $slider->btn_name, ['class' => 'form-control' , 'placeholder'=>'Enter Title Two']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('url', $slider->url, ['class' => 'form-control' , 'placeholder'=>'Enter Title Two']) }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="body">
                    @if($slider->image)
                        <img src="{{ asset('images/'. $slider->image) }}" style="width: 80px;" > <br>
                        <p>Available Image Preview </p>
                    @else
                        This Slide have no image if you want choose new
                    @endif
                    <div class="form-group">
                        {{ Form::file('image', ['class'  =>'dropify','id'=> 'input-file-max-fs', 'data-max-file-size' => '2M', 'data-allowed-file-extensions' => 'jpg jpeg png', ]) }}
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <label> Status</label>
                        {{ Form::select('status', statusOptions(), $slider->active, ['class' => 'form-control show tick' ]) }}
                    </div>
                    <input type="submit" class="btn btn-info btn-hsk  waves-effect m-t-20" value="Save">
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>
@stop
@section('page-script')
    <script src="{{asset('assets/js/ajax-hsk.js')}}"></script>

    <script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
@stop
