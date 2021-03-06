<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, width=device-width">
        <title>@yield('title')</title>
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
              integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
              crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
                integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
                crossorigin="anonymous">
        </script>
    </head>
    <body>
        {{-- Header --}}
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
            <div class="collapse navbar-collapse">
                @section('header')
                    <a class="navbar-brand" href="#">Laravel Views Example</a>
                @show
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                {{-- Content --}}
                <div class="col-md-12 main">
                    @section('content')
                        <p>This is my body content.</p>
                    @show
                </div>
            </div>
        </div>
    </body>
</html>