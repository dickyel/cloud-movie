@extends('layouts.admin')


@section('title','Link')

@section('content')

@include('sweetalert::alert')

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Edit Link</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('link-admin.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Nama Link:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>
            </div>
           
        </div>
        <button type="submit" class="btn btn-primary">Update Link</button>
    </form>
</div>

@endsection