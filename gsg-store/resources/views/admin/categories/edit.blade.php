@extends('layouts.admin')

@section('title', 'Edit Category')


@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Categories</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('categories.update', $category->id) }}" method="post">
        {{-- token --}}
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        {{-- {{ csrf_field() }} --}}
        @csrf
        @method('put')
        {{--  form method spoofing :
        <input type="hidden" name="_method" value="PUT">
        --}}


        @include('admin.categories._form', [
            'button' => 'Update'
        ])


        {{-- <div class="form-group">
            <label for="">Cetegory Name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
        </div>

        <div class="form-group">
            <label for="">Parent</label>
            <select name="parent_id" id="" class="form-control">
                <option value="">No Parent</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}" @if ($parent->id == $category->parent_id) selected @endif>
                        {{ $parent->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description">{{ $category->description }}}</textarea>
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status-active" value="active" @if($category->status == 'active') checked @endif>
                    <label class="form-check-label" for="status-active">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status-draft" value="draft" @if($category->status == 'draft') checked @endif>
                    <label class="form-check-label" for="status-draft">
                        Draft
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div> --}}

    </form>

@endsection
