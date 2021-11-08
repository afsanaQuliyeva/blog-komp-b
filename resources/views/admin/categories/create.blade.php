@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="card mt-3">
                <div class="card-header">
                    Yeni kateqoriya
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('categories.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Kateqoriya adı</label>
                            <input type="text" class="form-control" id="category" name="category_name" value="{{old('category_name')}}">
                            @error('category_name')
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>

        </section>
    </div>

@endsection
