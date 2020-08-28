@extends('layouts.master')
@section('title', 'Edit Post')
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
'route'        => ['post.update', 'post' => $post->id],
'method'       => 'PATCH',
'autocomplete' => 'off',
'id'           => 'ajax-form-hsk',
'files'        => 'true',
'redirectTo'   => route('post.index'),
]) !!}

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <label>title</label>
                        {{ Form::text('title', $post->title, ['class' => 'form-control' , 'placeholder'=>'Enter Post Title']) }}
                    </div>
                    <div class="form-group" >
                       <a class="slug" href="javascript:void(0)"> {{ $post->slug }}</a>
                        <span class="badge badge-primary slug-edit" >edit slug</span>
                        
                         <div class="slug-show" style="display:none;">
                         <label>Slug</label>
                        {{ Form::text('slug', $post->slug, ['class' => 'form-control slug-input']) }}
                        <btn class="btn btn-primary slug-save" style="display:none;" >save</btn>
                    </div>
                    </div>
                    
                    <div class="form-group">
                         <label>Category</label>
                        {{ Form::select('category', $categories, $post->category_id, ['class' => 'form-control show-tick']) }}
                    </div>
                    <div class="form-group">
                         <label>Meta Description (160 char only)</label>
                        {{ Form::textarea('meta_description', $post->meta_description, ['class' => 'form-control','rows'=>'2', 'placeholder'=>'Post Meta Description']) }}
                    </div>
                </div>
            </div>




            <div class="card">
                <div class="body">
                    <div class="form-group">
                         <label>Post Body</label>
                        {{ Form::textarea('body', $post->body, ['class' => 'summernote' , 'placeholder'=>'Post Body....']) }}
                    </div>

                </div>
            </div>

            <div class="card">
                @if($post->image)
                    <img src="{{ asset('images/'. $post->image) }}" style="width: 80px;" > <br>
                        <p>Available Image Preview </p>
                    @else
                        This post have no image if you want choose new
                    @endif
                <div class="body">
                    <div class="form-group">
                        {{ Form::file('image', ['class'  =>'dropify','id'=> 'input-file-max-fs', 'data-max-file-size' => '2M', 'data-allowed-file-extensions' => 'jpg jpeg png', ]) }}
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <p>Disclaimer </p>
                        {{ Form::textarea('disclaimer', $post->disclaimer, ['class' => 'summernote', 'placeholder'=>'disclaimer ...']) }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="form-group">
                        <label> Status</label>
                        {{ Form::select('status', statusOptions(), $post->active, ['class' => 'form-control show tick' ]) }}
                    </div>
                     <input type="submit" class="btn btn-info btn-hsk  waves-effect m-t-20" value="Save">
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>
@stop
@section('page-script')
<script>
    $(document).ready(function(){
    $('.slug-edit').click(function() {
      $('.slug-show').toggle("slide");
      $('.slug-edit').hide();
      $('.slug').hide();
      $('.slug-save').show();
    });
     $('.slug-save').click(function() {
          $('.slug-show').hide();
          $('.slug-edit').show();
          $('.slug').show();
         $('.slug-save').hide();
    });
    
    $(".slug-input").keyup(function() {
    var value = $( this ).val();
    $(".slug" ).text( value );
  })
  .keyup();
});
</script>

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
