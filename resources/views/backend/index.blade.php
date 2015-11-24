@extends('backend.layouts.master')


@section('title')

{{ $title }}

@endsection


@section('page_heading')

{{ $page_heading }}

@endsection


@section('content')

<div class="alert alert-info">
    admin area
</div>

<a class="btn btn-lg btn-success" href="admin/users">
  <i class="fa fa-users fa-2x pull-left"></i> All Users
</a>

@endsection