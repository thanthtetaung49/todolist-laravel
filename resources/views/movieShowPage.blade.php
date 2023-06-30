<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moviestans</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body class="bg-dark">
    <section class="">
        <nav class="nav">
            <div class="container-fluid">
                <div class="row pt-3">
                    <div class="col-4">
                        <h2 class="site-name">Moviestan</h2>
                    </div>
                    <div class="col-5">
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('movie#home') }}" class="nav-link">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('movie#tvshow') }}" class="nav-link">Tv Shows</a>
                            </li>
                            <li>
                                <a href="{{ route('movie#showPage') }}" class="nav-link">Movies</a>
                            </li>
                            <li>
                                <a href="{{ route('movie#upcomingMovie') }}" class="nav-link">Upcoming</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <form action="">
                            <input type="search" name="key" class="movie-search"
                                placeholder="Enter movie's name..." autocomplete="off">
                            <button type="submit" class="btn btn-sm rounded-circle"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="pb-1">
        <div class="container">
            <h4 class="text-light py-3">Movies</h4>

            <div class="row">
                @foreach ($data as $item)
                    @if ($item->types == 'movies')
                        <div class="col-2 mb-4">
                            <div class="movies">
                                <img src="{{ asset('storage/' . $item->image) }}" class="movie" alt="">

                                <a href="{{ route('movie#homeView', $item->id) }}" class="text-decoration-none">
                                    <span class="play-btn"><i class="fa-solid fa-play text-light fa-3x"></i></span>
                                </a>


                                <div class="rating-box">
                                    <i class="fa-solid fa-star text-warning px-1"></i>{{ $item->rating }}
                                </div>
                            </div>

                            <h6 class="text-light pt-2 fw-bold">{{ $item->title }}</h6>
                            <span
                                class="text-light fw-bold pb-3 update-time">{{ $item->created_at->format('M-d-y H:i') }}</span>
                        </div>
                    @endif
                @endforeach
                {{ $data->appends(request()->query())->links() }}
            </div>
        </div>
    </section>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>
