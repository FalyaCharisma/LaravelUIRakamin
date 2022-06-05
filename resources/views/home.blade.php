@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <a href="{{ route('createCategory') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH CATEGORY</a>
                </div>
            </div>
        </div>
          
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr> 
                        <th scope="col">NAME</th>
                        <th scope="col">USER ID</th>
                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->user_id }}</td>
                        <td>
                            <a href="{{ route('editCategory', $category->id) }}"  class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" action="{{ url('category/delete', $category->id) }}">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <a href="{{ route('createArticle') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH ARTICLE</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr> 
                        <th scope="col">TITLE</th>
                        <th scope="col">CONTENT</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col">CATEGORY ID</th>
                        <th scope="col">USER ID</th>
                        <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($article as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->content }}</td>
                        <td><img src="{{ asset('/storage/images/'. $article->image) }}" width="80" ></td>
                        <td>{{ $article->category_id }}</td>
                        <td>{{ $article->user_id }}</td>
                        <td>
                            <a href="{{ route('editArticle', $article->id) }}"  class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" action="{{ url('article/delete', $article->id) }}">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
