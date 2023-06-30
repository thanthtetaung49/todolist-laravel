@extends('main.mainHome')

@section('banner')
    <section class="container">
        <div class="row">
            <div class="col-6 py-3 banner">
                <h1 class="text-light pt-5">{{ $lastData->title }}</h1>

                <h3 class="text-light">{{ $lastData->additional_title }}</h3>

                <div class="about-movie">
                    <span><i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                    </span><span class="text-white px-2
                        ">Rating {{ $lastData->rating }}</span>

                    <div>
                        <button type="button"
                            class="btn btn-dark text-light my-3 category-btn ">{{ $lastData->category }}</button>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn my-2 review-btn"><i
                                class="fa-solid fa-play text-light"></i></button>
                        <button type="button" class="btn my-2 review-btn"><i
                                class="fa-solid fa-plus text-light"></i></button>
                    </div>
                </div>

                <p class="text-light my-2">{{ $lastData->description }}</p>
            </div>
    </section>
@endsection

@section('bodyContent')
    <section class="bg-dark pb-1">
        <div class="container">
            <h4 class="text-light py-3">Movies</h4>

            <div class="row">
                @foreach ($data as $item)
                    <div class="col-2 mb-4">
                        <div class="movies">
                            <img src="{{ asset('storage/' . $item->image) }}" class="movie" alt="">

                            <a href="{{ route('movie#homeView', $item->id) }}" class="text-decoration-none">
                                <span class="play-btn"><i class="fa-solid fa-play text-light fa-3x"></i>
                                </span>
                            </a>


                            <div class="rating-box">
                                <i class="fa-solid fa-star text-warning px-1"></i>{{ $item->rating }}
                            </div>
                        </div>

                        <h6 class="text-light pt-2 fw-bold">{{ $item->title }}</h6>
                        <span
                            class="text-light fw-bold pb-3 update-time">{{ $item->created_at->format('M-d-y H:i') }}</span>
                    </div>
                @endforeach
                {{ $data->appends(request()->query())->links() }}
            </div>
        </div>
    </section>
@endsection
