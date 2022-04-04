<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body class="antialiased">
<div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal mx-auto w-50" method="POST" enctype="multipart/form-data" action="/report">
        @csrf
        <fieldset>
            <!-- Form Name -->
            <legend>Report problem</legend>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-auto control-label" for="name">Name</label>
                <div class="col-auto">
                    <input id="name" name="name" type="text" placeholder="Enter your name"
                           class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-auto control-label" for="email">Email</label>
                <div class="col-auto">
                    <input id="email" name="email" type="email" placeholder="Enter your email address"
                           class="form-control input-md" required="">
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label class="col-auto control-label" for="message">Message</label>
                <div class="col-auto">
                        <textarea class="form-control" id="message"
                                  name="message" placeholder="Briefly describe your issue (max 2000 chars)" maxlength="2000"></textarea>
                </div>
                <span id="chars">2000</span> characters remaining
            </div>

            <!-- File Button -->
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label class="col-auto control-label" for="image">Upload image</label>
                        <div class="col-auto">
                            <input id="image" name="image" class="input-file" type="file" accept="image/jpeg, image/png">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mt-3">
                        <button class="btn btn-primary float-end" type="submit">Submit</button>
                    </div>
                </div>

            </div>


        </fieldset>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>

<script>
    let textArea = $('#message');
    let maxLength = textArea.attr('maxlength');
    $('#chars').text(maxLength);
    textArea.keyup(function() {
        let length = $(this).val().length;
        length = maxLength-length;
        $('#chars').text(length);
    });
</script>
</body>
</html>
