@extends('layouts.admin')


@section('title','Movie')

@section('content')

@include('sweetalert::alert')

<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Movie</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('movie-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Nama Movie:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Nama Studio:</label>
                    <input type="text" class="form-control" id="studio" name="studio">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Tahun:</label>
                    <input type="number" class="form-control" id="tahun" name="tahun">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="Artikel">Movie Desc:</label>
                    <textarea name="deskripsi" id="desc1" cols="30" rows="10" class="form-control-range"></textarea>
                </div>
            </div>
     
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="Genre">Genre:</label>
                    <select name="genre_id" class="form-control">
                        @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="Genre">Category:</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="Genre">Link:</label>
                    <select name="link_id" class="form-control">
                        @foreach ($links as $link)
                        <option value="{{ $link->id }}">{{ $link->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



           
        </div>
        <button type="submit" class="btn btn-primary">Tambah Movie</button>
    </form>
</div>


@endsection

@push('after-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<script>

    CKEDITOR.replace('desc1');

</script>
@endpush