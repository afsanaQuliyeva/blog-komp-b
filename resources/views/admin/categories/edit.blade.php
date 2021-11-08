@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="card mt-3">
                <div class="card-header">
                    Kateqoriyanı dəyişdir
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('categories.update', $category->id)}}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="category" class="form-label">Kateqoriya adı</label>
                            <input type="text" class="form-control" id="category" name="category_name" value="{{$category->category_name}}">
                            @error('category_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
                            @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Yadda saxla</button>
                    </form>

                </div>
            </div>

        </section>
    </div>

@endsection
