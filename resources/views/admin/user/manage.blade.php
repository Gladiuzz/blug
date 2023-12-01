@extends('layouts.app')

@section('title', 'Blug | Manage User')

@section('css')
@endsection

@section('content')
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Manage User</h5>
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
                action="{{ !empty($user) ? route('user.update', ['user' => $user->id]) : route('user.store') }}"
                method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if (!empty($user))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Enter name" value="{{ old('name', @$user->name) }}" name="name"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" placeholder="Enter username" value="{{ old('username', @$user->username) }}"
                        name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Enter Email" value="{{ old('email', @$user->email) }}" name="email"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="Enter Password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Upload Avatar</label>
                    <input class="form-control" value="{{ old('avatar', @$user->avatar) }}" type="file" name="avatar">
                </div>
                <div class="mt-3">
                    <button class="btn btn-sm btn-primary w-100" type="submit"><strong>Simpan</strong></button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
@endsection
