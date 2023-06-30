@extends('main.main')

@section('bodyContent')
    <section class="pt-3 home-view-section">
        <div class="container p-3">
            <div class="col-10 mx-auto">
                <div class="image-view">
                    <img src="{{ asset('storage/' . $data->image) }}" class="imgae-fluid image-thumbnail rounded"
                        width="100%" alt="">

                    <div class="text-end mt-2">
                        <span class="text-light">{{ $data->created_at->format('M-d-y H:i') }}</span>
                    </div>

                    <div class="my-3">
                        <h1 class="text-light">{{ $data->title }}</h1>
                        <h3 class="text-light">{{ $data->additional_title }}</h3>
                    </div>

                    <div class="my-2">
                        <button type="button" class="btn btn-sm bg-dark text-light">{{ $data->category }}</button>
                    </div>

                    <div class="my-2">
                        <span class=""><i class="fa-solid fa-star text-warning pe-2"></i></span>
                        <span class="text-light">Rating - {{ $data->rating }}</span>
                    </div>

                    <p class="mt-2 text-light movie-review">{{ $data->description }}</p>

                    <div class="d-flex justify-content-end">
                        <form action="">
                            <a href="{{ $data->links }}" type="submit" class="btn bg-dark download-btn">Download<i
                                    class="fa-solid fa-cloud-arrow-down ps-2"></i></a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
