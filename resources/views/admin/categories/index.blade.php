@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="mt-3">
                <a href="{{route('categories.create')}}" class="btn btn-warning">Yeni kateqoriya</a>
                <a href="{{route('categories.trash')}}" class="btn btn-dark">Trash</a>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Kateqoriyalar
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kateqoriya adı</th>
                            <th scope="col">Yaradılma tarixi</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no = 1)
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info">Dəyişdir</a>
                                    <a href="{{route('categories.delete', $category->id)}}" class="btn btn-danger">Sil</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection
