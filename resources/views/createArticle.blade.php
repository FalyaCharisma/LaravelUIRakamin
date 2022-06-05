@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-body">
            <h4>Tambah Article</h4>
            <form action="{{ route('article') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>TITLE</label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan Title"
                        class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>CONTENT</label>
                    <input type="text" name="content" value="{{ old('content') }}" placeholder="Masukkan Content"
                        class="form-control @error('content') is-invalid @enderror">
                    @error('content')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>IMAGE</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="form-group">
                    <label>CATEGORY</label>
                    <select class="form-control select-category_id @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">- SELECT CATEGORY -</option>
                            @foreach ($category as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach 
                    </select>
                            @error('category_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                </div>
                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                    SIMPAN</button>
                <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>
            </form>  
        </div>
    </div>
</div>
@endsection
