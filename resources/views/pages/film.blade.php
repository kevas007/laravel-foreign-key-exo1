
@extends('template.main')
@section('content')
    <section>
        <div class="container mt-5">
            <form action="/film" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">film: </label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <select name="category_id" class="form-select mb-5" aria-label="Default select example">
                    <option selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="container mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">film</th>
                        <th scope="col">category</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr>
                            <th scope="row">{{ $film->id }}</th>
                            <td>{{ $film->title }}</td>
                            <td>{{ $film->categories->category }}</td>
                            <td>
                                <form action="/film/{{ $film->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
