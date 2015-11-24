@extends('backend.layouts.master')
<?php 
$module_name_singular = str_singular($module_name);
?>

@section('title')

{{ $title }}

@endsection


@section('page_heading')

{{ ucfirst($module_name_singular) }} {{ $module_action }}

@endsection


@section('content')

<p>
    <a href="{{ route("admin.$module_name.index") }}" class="btn btn-success">
        <i class="fa fa-users"></i> {{ ucfirst($module_name_singular) }} List
    </a>
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
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>
                {{ $$module_name_singular->id }}
            </td>
            <td>
                {{ $$module_name_singular->name }}
            </td>
            <td>
                {{ $$module_name_singular->label }}
            </td>
            <td>
                {{ $$module_name_singular->created_at->format('M jS Y g:ia') }}
            </td>
            <td>
                {{ $$module_name_singular->updated_at->format('M jS Y g:ia') }}
            </td>
        </tr>

    </tbody>
</table>

@endsection