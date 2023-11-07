@extends('layouts.admin')


@section('title','User')

@section('content')

@include('sweetalert::alert')

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Edit User</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('user-admin.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Nama User:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Email:</label>
                    <input type="text" class="form-control" id="name" name="email" value="{{ $item->email }}" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Roles</label>
                    <select name="role_id" class="form-control">
                        <option value="{{ $item->role_id}}">{{ $item->role->name }}</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Password:</label>
                    <input type="password" class="form-control" id="name" name="password" >
                </div>
            </div>
           
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>

@endsection