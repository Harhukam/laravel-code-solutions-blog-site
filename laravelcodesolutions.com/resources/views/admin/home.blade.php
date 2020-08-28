@extends('layouts.master')
{{-- @section('title', 'Dashboard')
@section('parentPageTitle', 'Welcome to admin panel') --}}
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Welcome</strong> {{ Auth::user()->name }}</h2>
                </div>
                <div class="body">
                    <h5>Dashboard</h5>
                    <p>Nothing in dashboard...</p>
                </div>
            </div>
        </div>
    </div>
@stop
