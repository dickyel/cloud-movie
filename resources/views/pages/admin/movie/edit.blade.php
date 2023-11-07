@extends('layouts.admin')


@section('title','Movie')

@section('content')


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Edit Movie</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('movie-admin.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT') 
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Nama Movie:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Nama Studio:</label>
                    <input type="text" class="form-control" id="studio" name="studio" value="{{ $item->studio }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="kategori">Tahun:</label>
                    <input type="number" class="form-control" id="tahun" name="tahun" value="{{ $item->tahun }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="Artikel">Movie Desc:</label>
                    <textarea name="deskripsi" id="desc1" cols="30" rows="10" class="form-control-range">{!! $item->deskripsi !!}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="Genre">Genre:</label>
                    <select name="genre_id" class="form-control">
                        <option value="{{ $item->genre_id }}">{{ $item->genre->name }}</option>
                        <option value="" disabled>-------------</option>
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
                        <option value="{{ $item->category_id }}">{{ $item->category->name }}</option>
                        <option value="" disabled>-------------</option>
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
                        <option value="{{ $item->link_id }}">{{ $item->link->name }}</option>
                        <option value="" disabled>-------------</option>
                        @foreach ($links as $link)
                        <option value="{{ $link->id }}">{{ $link->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        
        </div>
        <button type="submit" class="btn btn-primary">Update Movie</button>
    </form>
  
    <div class="card mt-5">
        <div class="card-body">
            <div class="row">
                @foreach($item->galleries as $gallery)
                <div class="col-md-3">
                    <div class="gallery-container">
                        <img src="{{ Storage::url($gallery->url ?? '') }}" alt="" class="w-100">
                        <a href="{{ route('movie-admin.image.destroy', $gallery->id) }}"><img src="{{ asset('/weather/images/icon-delete.svg') }}" alt=""></a>
                    </div>
                </div>
                @endforeach
                <div class="col-12">
                    <form action="{{ route('movie-admin.image.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf       
                        
                        <input type="hidden" value="{{ $item->id }}" name="movie_id">

                        <input type="file" 
                        name="url"
                        id="file" style="display: none;" multiple onchange="form.submit()"/>
                        
                        <button type="button" class="btn btn-dark btn-block mt-4" onclick="thisFileUpload()">Tambah Foto</button><br>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>


 



@endsection

@push('after-script')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<script>
    function thisFileUpload() {
        document.getElementById("file").click();
    }
</script>


<script>
    function toggleForm() {
    var form = document.getElementById("myForm");
        form.classList.toggle("hidden");
    }
</script>

<script>

    CKEDITOR.replace('desc1');

</script>
@endpush