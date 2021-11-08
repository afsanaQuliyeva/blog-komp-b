<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kateqoriya adı</th>
                                <th scope="col">Yaradılma tarixi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($no = 1)
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card-body bg-white">
                    <form method="POST" action="{{route('category.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="category" class="form-label">Kateqoriya adı</label>
                            <input type="text" class="form-control" id="category" name="category_name" value="{{old('category_name')}}">
                            @error('category_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                            @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
