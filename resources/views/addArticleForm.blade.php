@extends('layouts.master')
@section('title', 'Input News')
@section('container')    
    <div class="container">
    <h3 class="text-center mt-3">Form Input News</h3>
    <hr/>
    <form method="POST" action="/store">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="form-group row">
            <input type="hidden" name="action">
            <label for="inputName" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name" name="title" required/>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputArticle" class="col-sm-2 col-form-label">Article</label>
            <div class="col-sm-10">
                <textarea name="article" class="form-control" id="inputArticle2" placeholder="Article"  required></textarea>
            </div>
        </div>
        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" class="form-control kategri" required>
                                <option value="">-Select Category-</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="SAVE">
            </div>
        </div>
    </form>
    <table class="table">
        <thead class="thead-dark">
            <th>No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($articles as $key=>$article)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->article}}</td>
                <td>{{$article->category['title']}}</td>
                <td align="center">
                <div>
                  <a href="/{{$article->id}}/edit" class="btn btn-xs btn-warning" title="Ubah"><i class="fa fa-edit"></i></button>
                
               
                  <a href="/{{$article->id}}/delete" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                    <i class="fa fa-trash"></i>
                  </a>
                </div>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
