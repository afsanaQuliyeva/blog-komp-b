@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="card mt-3">
                <div class="card-header">
                    Yeni məqalə
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Məqalənin adı</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                            @error('title')
                             <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Açıqlama</label>
                            <textarea name="desc" id="description" class="form-control" rows="10">{{old('desc')}}</textarea>
                            @error('desc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content">Məqalə mətni</label>
                            <textarea name="content" id="content" class="form-control" rows="50">{{old('content')}}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                            @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Şəkil</label>
                            <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>

        </section>
    </div>

@endsection
