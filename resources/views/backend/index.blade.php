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


<a class="btn btn-lg btn-success" href="admin/roles">
  <i class="fa fa-user-secret fa-2x pull-left"></i> All Roles
</a>


<a class="btn btn-lg btn-success" href="admin/permissions">
  <i class="fa fa-key fa-2x pull-left"></i> All Permissions
</a>

@endsection