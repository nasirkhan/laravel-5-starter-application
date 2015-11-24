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
    <a href="{{ route("admin.$module_name.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create {{ ucfirst($module_name_singular) }}</a>
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
                Label
            </th>
            <th>
                Created At
            </th>
            <th>
                Updated At
            </th>
            <th>
                Action
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
                <a href="{{ route("admin.$module_name.show", $module_name_singular->id) }}" >
                    {{ $module_name_singular->name }}
                </a>
            </td>
            <td>
                {{ $module_name_singular->label }}
            </td>
            <td>
                {{ $module_name_singular->created_at }}
            </td>
            <td>
                {{ $module_name_singular->updated_at }}
            </td>
            <td>
                <a class="btn btn-primary" href="{{ route("admin.$module_name.edit", $module_name_singular->id) }}">
                    Edit
                </a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>

{!! $$module_name->render() !!}

@endsection