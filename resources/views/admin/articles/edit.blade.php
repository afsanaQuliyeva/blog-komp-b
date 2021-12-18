@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="card mt-3">
                <div class="card-header">
                    Məqaləni dəyişdir
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('articles.update', $article->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label">Məqalənin adı</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title', $article->title)}}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description">Açıqlama</label>
                            <textarea name="desc" id="description" class="form-control" rows="10">{{old('desc', $article->desc)}}</textarea>
                            @error('desc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content">Məqalə mətni</label>
                            <textarea name="content" id="content" class="form-control" rows="30">{{old('content', $article->content)}}</textarea>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
{{--                            <img src="{{$article->image}}" alt="">--}}
                            <img src="{{asset('uploads/'.$article->image)}}" alt="" width="200">
                            <input type="hidden" value="{{$article->image}}" name="old_image">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Şəkil</label>
                            <input type="file" class="form-control" id="image" name="image" >
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Kateqoriyalar</label>
                            <select name="categories[]" id="category" class="form-control" multiple>
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}"
                                        @if($article->getCategories->contains($category->id))
                                            {{ 'selected' }}
                                        @endif
                                    >
                                        {{$category->category_name}}{{$category->category_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Yadda saxla</button>
                    </form>

                </div>
            </div>

        </section>
    </div>

@endsection
