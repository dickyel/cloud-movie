@extends('layouts.admin')


@section('title','Genre')

@section('content')


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Edit Genre</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('genre-admin.update', $item->id ) }}" method="post" enctype="multipart/form-data">
        @method('PUT') 
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Nama Genre:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Slug</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->slug }}">
                </div>
            </div>
        
        </div>
        <button type="submit" class="btn btn-primary">Update Genre</button>
    </form>
</div>


@endsection