@extends('admin.layouts.app')

@section('header')
@php
    $breadcrumb = [
        ['title' => 'Dashboard'],
    ];
@endphp
@include('admin.layouts.header', ['titleHeader' => 'Dashboard', 'breadcrumb' => $breadcrumb])
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            Selamat Datang  <b>{{ auth()->user()->name }}</b>!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection