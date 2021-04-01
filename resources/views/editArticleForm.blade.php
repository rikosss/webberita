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
                <input type="text" class="form-control" id="inputName" placeholder="Name" name="title" required value="{{$article->title}}"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputArticle" class="col-sm-2 col-form-label">Article</label>
            <div class="col-sm-10">
                <textarea name="article" class="form-control" id="inputArticle2" placeholder="Article"  required>{{$article->article}}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <select name="category_id" class="form-control kategori" required>
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
@endsection