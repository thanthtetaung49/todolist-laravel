@extends('main.main')

@section('bodyContent')
    <div class="container">
        @if (session('create'))
            <div class="row">
                <div class="col-4 mt-2">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{ session('create') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        @if (session('update'))
            <div class="row">
                <div class="col-4 mt-2">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>{{ session('update') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        @if (session('delete'))
            <div class="row">
                <div class="col-4 mt-2">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('delete') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-4 bg-light shadow-sm my-2 p-3">
                <form action="{{ route('movie#createPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                        <label>Movie Title</label>
                        <input type="text" name="movieTitle"
                            class="form-control form-control-sm @error('movieTitle')
                            is-invalid
                        @enderror"
                            value="{{ old('movieTitle') }}" placeholder="Enter movie's post title...">
                        @error('movieTitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Movie additional title</label>
                        <input type="text" name="aTitle"
                            class="form-control form-control-sm @error('aTitle')
                            is-invalid
                        @enderror"
                            value="{{ old('aTitle') }}" placeholder="Enter addtional movie's post title...">
                        @error('aTitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Movie Description</label>
                        <textarea name="movieDescription"
                            class="form-control form-control-sm @error('movieDescription')
                            is-invalid
                        @enderror"
                            cols="10" rows="7" placeholder="Enter movie's description...">{{ old('movieDescription') }}</textarea>
                        @error('movieDescription')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Image</label>
                        <input type="file" name="movieImage"
                            class="form-control form-control-sm @error('movieImage')
                            is-invalid
                        @enderror"
                            value="{{ old('movieImage') }}" placeholder="Enter image...">
                        @error('movieImage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Category</label>
                        <input type="text" name="movieCategory"
                            class="form-control form-control-sm @error('movieCategory')
                            is-invalid
                        @enderror"
                            value="{{ old('movieCategory') }}">
                        @error('movieCategory')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label>Rating</label>
                        <input type="number" name="movieRating"
                            class="form-control form-control-sm @error('movieRating')
                            is-invalid
                        @enderror"
                            value="{{ old('movieRating') }}" min="0" max="10"
                            placeholder="Enter your movie's rating...">
                        @error('movieRating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Types</label>
                        <select name="movieTypes" class="form-select form-select-sm @error('movieTypes')
                            is-invalid
                        @enderror" vlaue="{{ old('movieTypes') }}">
                            <option value="shows">Tv Shows</option>
                            <option value="movies">movies</option>
                            <option value="upcoming">upcoming</option>
                        </select>
                        @error('movieTypes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Download link</label>
                        <input type="text" name="downloadLinks" class="form-control form-control-sm @error('downloadLinks')
                            is-invalid
                        @enderror" value="{{ old('downloadLinks') }}" placeholder="Enter download link">
                        @error('downloadLinks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <input type="submit" class="btn bg-info" value="Create">
                    </div>

                </form>
            </div>
            <div class="col-7 offset-1 my-2">
                <div class="row">
                    <div class="col-6 offset-6 my-2">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" name="key" placeholder="Search"
                                aria-label="Search">
                            <button type="submit" class="btn btn-outline-info">Search</button>
                        </form>
                    </div>
                </div>
                @foreach ($posts as $item)
                    <div class="bg-light p-3 my-3 shadow-sm">
                        <h6 class="text-end my-2">{{ $item->created_at->format('d-M-Y H:i A') }}</h6>
                        <h4>{{ $item->title }}</h4>
                        <p>{{ Str::words($item->description, 30, '...') }}</p>

                        <div class="d-flex justify-content-end">
                            <div class="mx-2">
                                <a href="{{ route('movie#edit', $item->id) }}" class="btn btn-sm bg-info"><i
                                        class="fa-solid fa-pen-to-square"></i>Edit</a>
                            </div>
                            <div class="mx-2">
                                <a href="{{ route('movie#delete', $item->id) }}" class="btn btn-sm bg-danger"><i
                                        class="fa-solid fa-trash"></i>Delete</a>
                            </div>

                        </div>

                    </div>
                @endforeach
                {{ $posts->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
@endsection
