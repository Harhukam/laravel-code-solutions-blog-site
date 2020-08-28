@extends('layouts.master')
@section('title', 'Add New Post')
@section('parentPageTitle', 'Post')
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
                               'route'        => 'post.store',
                               'method'       => 'POST',
                               'autocomplete' => 'on',
                               'id'           => 'ajax-form-hsk',
                               'files'        => 'true',
                               'redirectTo'   => route('post.index'),
                               ]) !!}

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        {{ Form::text('title', null, ['class' => 'form-control' , 'placeholder'=>'Enter Post Title']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::select('category', $categories, null, ['class' => 'form-control show-tick']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::textarea('meta_description', null, ['class' => 'form-control','rows'=>'2', 'placeholder'=>'Post Meta Description']) }}
                    </div>
                </div>
            </div>




            <div class="card">
                <div class="body">
                    <div class="form-group">
                        {{ Form::textarea('body', null, ['class' => 'summernote' , 'placeholder'=>'Post Body....']) }}
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        {{ Form::file('image', ['class'  =>'dropify','id'=> 'input-file-max-fs', 'data-max-file-size' => '2M', 'data-allowed-file-extensions' => 'jpg jpeg png', ]) }}
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <p>Disclaimer text</p>
                        {{ Form::textarea('disclaimer', null, ['class' => 'summernote' , 'placeholder'=>'disclaimer ...']) }}
                    </div>
                    <input type="submit" class="btn btn-info waves-effect m-t-20" value="Save">
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>
@stop
@section('page-script')
<script>
$(document).ready(function() {
      $('.summernote').summernote({
        placeholder: 'Type here...',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
        //  ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']],
          ['height', ['height']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
});
    </script>
    
    <script src="{{asset('assets/js/ajax-hsk.js')}}"></script>

    <script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
@stop
