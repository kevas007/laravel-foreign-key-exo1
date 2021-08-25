@extends('template.main')
@section('content')
    <section>
        <div class="container mt-5">
            @foreach ($categories as $category)
                <h1>{{ $category->category }}</h1>
                <ul>
                    @forelse ($category->films as $film)
                    <li>{{$film->title}}</li>
                    @empty
                    <p>pas de films dispo</p>
                    @endforelse
                </ul>
            @endforeach
        </div>
    </section>
@endsection
