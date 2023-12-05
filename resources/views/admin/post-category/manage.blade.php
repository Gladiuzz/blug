@extends('layouts.app')

@section('title', 'Blug | Manage Category Post')

@section('css')
@endsection

@section('content')
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Manage Category</h5>
            <div class="ibox-tools">
            </div>
        </div>
        <div class="ibox-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form role="form"
                action="{{ !empty($category) ? route('post-category.update', ['post_category' => $category->id]) : route('post-category.store') }}"
                method="POST">
                {{ csrf_field() }}
                @if (!empty($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" placeholder="Enter Category Name" value="{{ old('name', @$category->name) }}"
                        name="name" class="form-control">
                    <div>
                        <div class="mt-3">
                            <button class="btn btn-sm btn-primary w-100" type="submit"><strong>Simpan</strong></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
@endsection
