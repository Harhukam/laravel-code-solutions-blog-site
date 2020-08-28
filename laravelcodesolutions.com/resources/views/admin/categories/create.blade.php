@extends('layouts.master')
@section('title', 'Add New Category')
@section('parentPageTitle', 'Categories')
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
                               'route'        => 'categories.store',
                               'method'       => 'POST',
                               'autocomplete' => 'on',
                               'id'           => 'ajax-form-hsk',
                               'files'        => 'true',
                               'redirectTo'   => route('categories.index'),
                               ]) !!}

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        {{ Form::text('category_name', null, ['class' => 'form-control' , 'placeholder'=>'Enter Category Name']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::select('parent', $categories, null, ['class' => 'form-control show-tick']) }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="form-group">
                    {{ Form::file('image', ['class'  =>'dropify','id'=> 'input-file-max-fs', 'data-max-file-size' => '2M', 'data-allowed-file-extensions' => 'jpg jpeg png', ]) }}
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
