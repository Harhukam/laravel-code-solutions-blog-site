@extends('layouts.master')
@section('title', 'List')
@section('parentPageTitle', 'Categories')
@section('content')

    <!-- Bordered Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                  <a href="{{ route('post.create') }}" class="btn btn-info btn-hsk float-right  waves-effect m-t-20"> Add New </a>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">Sno.</th>
                                <th width="50%">Post title</th>
                                <th width="20%">Category </th>
                                <th width="10%">Status</th>
                                <th width="15%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $number = 1; @endphp

                            @if($posts->count() > 0)
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $number++ }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->category_name  }}</td>
                                        <td>
                                            {!!   ($post->active =='Y') ? '<span class="badge badge-success">Active</span>' :
                                                                   '<span class="badge badge-danger">Disable</span>' !!}
                                        </td>
                                        <td>
                                            <form action="{{ route('post.destroy',$post->id) }}"
                                                  method="POST" id="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('post.edit', $post->id) }}"
                                                       class="btn btn-primary ">
                                                        <i class="zmdi zmdi-edit"></i> </a>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('sure to delete ?')">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-danger text-danger"> no data found.</td>
                                        </tr>
                                    @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@stop
