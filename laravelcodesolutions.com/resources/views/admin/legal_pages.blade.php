@extends('layouts.master')
@section('title', 'Update')
@section('parentPageTitle', 'Legal Pages')
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
                               'route'        => 'site.store',
                               'method'       => 'POST',
                               'autocomplete' => 'on',
                               'id'           => 'ajax-form-hsk',
                               'files'        => 'true',
                               'redirectTo'   => route('site.index'),
                               ]) !!}

            <div class="card">
                <div class="body">
                    <div class="float-right">
                    <div class="form-group">
                    <input type="submit" class="btn btn-info btn-hsk  waves-effect m-t-20" value="Save Information">
                    </div>
                    </div>

                    <div class="form-group">
                        <label>Email Id</label>
                        {{ Form::text('email', isset($site->email)?$site->email:null, ['class' => 'form-control' , 'placeholder'=>'Email']) }}
                    </div>

                </div>
            </div>


            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <label>FAQ </label>
                        {{ Form::textarea('faq', isset($site->faq)?$site->faq:null, ['class' => 'summernote' , 'placeholder'=>'Post Body....']) }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <label>Term & Conditions </label>
                        {{ Form::textarea('term_and_conditions', isset($site->term_and_conditions)?$site->term_and_conditions:null, ['class' => 'summernote' , 'placeholder'=>'Post Body....']) }}
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <label>Privacy Policy </label>
                        {{ Form::textarea('privacy_policy', isset($site->privacy_policy)?$site->privacy_policy:null, ['class' => 'summernote' , 'placeholder'=>'Post Body....']) }}
                    </div>
                       <div class="float-right">
                           <input type="submit" class="btn btn-info btn-hsk   waves-effect m-t-20 m-b-20" value="Save Information" />
                        </div>
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
