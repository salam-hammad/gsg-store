{{-- code already in layout
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body> --}}

{{-- Blade --}}

<!-- <h2>Categories List</h2> -->
{{-- <h2>{{ $title }} {{ 1 + 1 }}</h2>  Result => Categories List 2 --}}

@extends('layouts.admin')

@section('title')
{{ $title }} <a href="{{ route('categories.create') }}">Create</a>
@endsection

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
</ol>
@endsection

@section('content')


<table class="table">
    <thead>
        <tr>
            <th>Loop</th>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Parent ID</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <!-- Collection -->
        @foreach ($categories as $category)
            <tr>
                {{-- <td>{{ $loop->index }}</td> --}}
                <td>{{ $loop->first ? 'First' : ($loop->last ? 'Last' : $loop->iteration) }}</td>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->parent_id }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->created_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>

@endsection

{{--     
</body>
</html> --}}
