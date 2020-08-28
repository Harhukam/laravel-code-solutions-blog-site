@extends('layouts.master')
@section('title', 'List')
@section('parentPageTitle', 'Slider')
@section('content')

    <!-- Bordered Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th width="5%">Sno.</th>
                                <th width="20%">Title</th>
                                <th width="15%">Title 2</th>
                                <th width="15%">Description</th>
                                <th width="10%">Btn Name</th>
                                <th width="10%">Url</th>
                                <th width="5%">Status</th>
                                <th width="20%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $number = 1; @endphp

                            @if($sliders->count() > 0)
                                @foreach($sliders as $slider)
                                    <tr>
                                        <td>{{ $number++ }}</td>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->title2 }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td>{{ $slider->btn_name }}</td>
                                        <td>{{ $slider->url }}</td>
                                        <td>
                                            {!!   ($slider->active =='Y') ? '<span class="badge badge-success">Active</span>' :
                                                                   '<span class="badge badge-danger">Disable</span>' !!}
                                        </td>
                                        <td>
                                            <form action="{{ route('slider.destroy',$slider->id) }}"
                                                  method="POST" id="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('slider.edit', $slider->id) }}"
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

            </div>
        </div>
    </div>
@stop
