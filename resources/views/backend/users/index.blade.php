@extends('backend.layouts.master')

<?php 
$module_name_singular = str_singular($module_name);
?>

@section('title')

{{ $title }}

@endsection


@section('page_heading')

{{ ucfirst($module_name) }} List

@endsection


@section('content')

<p>
    <a href="{{ route('admin.users.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Create {{ ucfirst($module_name_singular) }}</a>
</p>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>
                Id
            </th>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Created At
            </th>
            <th>
                Updated At
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach( $$module_name as  $module_name_singular)
        
        <tr>
            <td>
                {{ $module_name_singular->id }}
            </td>
            <td>
                {{ $module_name_singular->name }}
            </td>
            <td>
                {{ $module_name_singular->email }}
            </td>
            <td>
                {{ $module_name_singular->created_at }}
            </td>
            <td>
                {{ $module_name_singular->updated_at }}
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>

@endsection