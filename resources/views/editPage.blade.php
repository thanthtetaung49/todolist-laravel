@extends('main.main')

@section('bodyContent')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3 my-4">
                <form action="{{ route('movie#edit#done', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label>Movie title</label>
                        <input type="text" name="movieTitle"
                            class="form-control form-control-sm @error('movieTitle')
                            is-invalid
                        @enderror"
                            value="{{ old('movieTitle', $data->title) }}" placeholder="Edit movie's Movie title...">
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
                            value="{{ old('aTitle', $data->addtional_title) }}"
                            placeholder="Enter addtional movie's post title...">
                        @error('aTitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Movie description</label>
                        <textarea name="movieDescription"
                            class="form-control form-control-sm @error('movieDescription')
                            is-invalid
                        @enderror"
                            cols="30" rows="10" placeholder="Edit movie's description">{{ old('movieDescription', $data->description) }}</textarea>
                        @error('movieDescription')
                            <div class="invalid-feedback">{{ $messaage }}</div>
                        @enderror
                    </div>

                    @if ($data->image == null)
                        <div class="my-2">
                            <img src="{{ asset('storage/error_photo.jpg') }}" class="image-fluid image-thumbnail"
                                alt="error404_photo" width="100%">
                        </div>
                    @else
                        <div class="my-2">
                            <img src="{{ asset('storage/' . $data->image) }}" class="image-fluid image-thumbnail"
                                alt="{{ $data->image }}" width="100%">
                        </div>
                    @endif

                    <div class="form-group mb-3">
                        <label>Movie image</label>
                        <input type="file" name="movieImage"
                            class="form-control form-control-sm @error('movieImage')
                            is-invalid
                        @enderror"
                            value="{{ old('movieImage', $data->image) }}" placeholder="Edit image...">
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
                            value="{{ old('movieCategory', $data->category) }}">
                        @error('movieCategory')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Rating</label>
                        <input type="number" name="movieRating"
                            class="form-control form-control-sm @error('movieRating')
                            is-invalid
                        @enderror"
                            value="{{ old('movieRating', $data->rating) }}" placeholder="Edit rating..." min="0"
                            max="10">
                        @error('movieRating')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Types</label>
                        <select name="movieTypes" class="form-select form-select-sm @error('movieTypes')
                            is-invalid
                        @enderror" vlaue="{{ old('movieTypes', $data->types) }}">
                            <option value="shows">Tv Shows</option>
                            <option value="movies">movies</option>
                            <option value="upcoming">upcoming</option>
                        </select>
                        @error('movieTypes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Download link</label>
                        <input type="text" name="downloadLinks" class="form-control form-control-sm @error('downloadLinks')
                            is-invalid
                        @enderror" value="{{ old('downloadLinks', $data->links) }}" placeholder="Enter download link">
                        @error('downloadLinks')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn bg-dark text-light mt-5" value="Done">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
