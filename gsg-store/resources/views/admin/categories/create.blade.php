@extends('layouts.admin')

@section('title', 'Create New Category')


@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')

<form action="{{ route('categories.store') }}" method="post">
    {{-- token --}}
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    {{-- {{ csrf_field() }} --}}
    @csrf

    @include('admin.categories._form', [
        'button' => 'Add',
    ])
    
    {{-- <div class="form-group">
        <label for="">Cetegory Name</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label for="">Parent</label>
        <select name="parent_id" id="" class="form-control">
            <option value="">No Parent</option>
            @foreach($parents as $parent)
            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div> --}}

</form>

@endsection