@extends('layouts.master')
@section('content')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


        <!-- DivTable.com -->

        <table class="table w-100">
            <tbody>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Message</td>
                <td>Filename</td>
            </tr>
            @if($records->isNotEmpty())
                @foreach($records->all() as $record)
                    <tr>
                        <td>{{$record->id}}</td>
                        <td>{{$record->name}}</td>
                        <td>{{$record->email}}</td>
                        <td>{{$record->message}}</td>
                        <td>{{$record->filename}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            {{$records->links()}}
        </table>

        <div class="w-100 justify-center">
            <a class="btn btn-primary mx-auto" href="/form">Report Problem</a>
        </div>
    </div>
@endsection
