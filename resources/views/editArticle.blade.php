@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-body">
            <h4>Edit Article</h4>
            <form action="{{ url('article/articleUpdate', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>TITLE</label>
                    <input type="text" name="title" value="{{ old('title', $article->title) }}"
                    class="form-control"> 
                    @error('title')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>CONTENT</label>
                    <input type="text" name="content" value="{{ old('content', $article->content) }}"
                    class="form-control"> 
                    @error('content')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>IMAGE</label>
                    <input type="file" name="image" id="image"  value="{{ old('image', $article->image) }}"  class="form-control">
                        @error('image')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="form-group">
                    <label>CATEGORY</label>
                    @foreach ($category as $category)
                    <select class="form-control select-category_id" name="category_id" value="{{ old('category_id', $category->name) }}" >
                        <option value="">- SELECT CATEGORY -</option>
                            
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
