@extends('layouts.master')
@section('title', 'List')
@section('parentPageTitle', 'Categories')
@section('content')

    <!-- Bordered Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="body">
                          <a href="{{ route('categories.create') }}" class="btn btn-info btn-hsk float-right  waves-effect m-t-20"> Add New </a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                           <tr>
                                <th width="5%">Sno.</th>
                                <th width="25%">Category Name</th>
                                <th width="25%">Parent Category </th>
                                <th width="20%">Status</th>
                                <th width="20%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $number = 1; @endphp

                            @if($categories->count() > 0)
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $number++ }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ ($category->parent != null) ? $category->parent : '-----' }}</td>
                                        <td>
                                            {!!   ($category->active =='Y') ? '<span class="badge badge-success">Active</span>' :
                                                                   '<span class="badge badge-danger">Disable</span>' !!}
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.destroy',$category->id) }}"
                                                  method="POST" id="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('categories.edit', $category->id) }}"
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
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@stop
