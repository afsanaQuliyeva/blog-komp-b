@extends('admin.layouts.master')
@section('maincontent')
    <div class="content-wrapper">
        <section class="content">
            <div class="card mt-3">
                <div class="card-header">
                    Silinmiş Kateqoriyalar
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kateqoriya adı</th>
                            <th scope="col">Silinmə tarixi</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($no = 1)
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->deleted_at->diffForHumans()}}</td>
                                <td>
                                    <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">Həmişəlik Sil</button>
                                    </form>
                                    <a href="{{route('categories.restore', $category->id)}}" class="btn btn-success">Bərpa et</a>
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
