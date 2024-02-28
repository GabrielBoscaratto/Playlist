<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SectoTeca</title>

    <link rel="Stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container">
                <a class="navbar-brand text-white" href="/">SectoTeca</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route("playlists.index")}}">Playlist</a>
                            
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{route("conteudos.index")}}">Conteudo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script>
        function FormSubmit(id) {
            $(document).on("submit", id, function(e) {
                e.preventDefault();

                let url = $(this).attr("action");
                let method = $(this).attr("method");
                let data = $(this).serialize();


                $.ajax({
                    url,
                    method,
                    data,
                    beforeSend: function() {
                        $('[id^="input-"]').removeClass("is-invalid");
                        $('[id^="invalid-"]').text();
                    },
                    success: function(response) {
                        window.location.href = response.url;
                    },
                    error: function(error) {
                        let status = error.status;

                        switch (status) {
                            case 422:
                                let messages = error.responseJSON.errors;

                                for (let [key, value] of Object.entries(messages)) {
                                    $(`#input-${key}`).addClass("is-invalid");
                                    $(`#invalid-${key}`).text(value[0]);
                                }
                                break;

                            default:   
                                alert("Ocorreu um erro interno, tente novamente mais tarde.");
                        }
                    }
                })
            })
        }
    </script>
    @stack('js')

</body>

</html>
