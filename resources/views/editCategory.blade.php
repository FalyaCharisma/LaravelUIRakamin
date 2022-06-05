@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-body">
            <h4>Edit Category</h4>
            <form action="{{ url('category/categoryUpdate', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>NAME</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}"
                    class="form-control"> 
                    @error('name')
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
