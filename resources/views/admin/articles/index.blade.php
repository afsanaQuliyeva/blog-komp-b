@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="mt-3">
                <a href="{{route('articles.create')}}" class="btn btn-warning">Yeni məqalə</a>
                <a href="" class="btn btn-dark">Trash</a>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    Məqalələr
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Məqalənin başlığı</th>
                            <th scope="col">Açıqlama</th>
                            <th>Slug</th>
                            <th scope="col">Foto</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @php($no = 1)--}}
                        @foreach($articles as $article)
                            <tr>
{{--                                <th scope="row">{{ $no++ }}</th>--}}
                                <th scope="row">{{ $articles->firstItem() + $loop->index  }}</th>
                                <td>{{$article->title}}</td>
                                <td>{{$article->desc}}</td>
                                <td>{{$article->slug}}</td>
                                <td>
                                    <img src="{{asset('uploads/'.$article->image)}}" alt="" width="200">
                                </td>
                                <td>
                                    <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info">Dəyişdir</a>
                                    <a href="" class="btn btn-danger">Sil</a>
                                    <a href="{{route('articles.show', $article->id)}}" class="btn btn-success">Məqaləni göstər</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div>
                        {{$articles->links()}}
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
