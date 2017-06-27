<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, width=device-width">
        <title>Laravel Views Example</title>
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body>
        {{-- Header --}}
        <nav class="navbar navbar-inverse">
            This is the master header.
        </nav>

        <div class="container-fluid">
            <div class="row">
                {{-- Sidebar --}}
                <div class="col-md-2 sidebar">
                    This is the master sidebar.
                </div>

                {{-- Content --}}
                <div class="col-md-10 col-md-offset-2 main">
                    <p>This is my body content.</p>
                </div>
            </div>
        </div>
    </body>
</html>