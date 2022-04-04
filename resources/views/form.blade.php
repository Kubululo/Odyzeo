@extends('layouts.master')
@section('content')
    <div class="w-100 justify-center">
        <a class="btn mx-auto" href="/">Home</a>
    </div>
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
                                  name="message" placeholder="Briefly describe your issue (max 2000 chars)"
                                  maxlength="2000"></textarea>
                    </div>
                    <span id="chars">2000</span> characters remaining
                </div>

                <!-- File Button -->
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="col-auto control-label" for="image">Upload image</label>
                            <div class="col-auto">
                                <input id="image" name="image" class="input-file" type="file"
                                       accept="image/jpeg, image/png">
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
@endsection
@once
    @push('scripts')
        <script>
            let textArea = $('#message');
            let maxLength = textArea.attr('maxlength');
            $('#chars').text(maxLength);
            textArea.keyup(function () {
                let length = $(this).val().length;
                length = maxLength - length;
                $('#chars').text(length);
            });
        </script>
    @endpush
@endonce

