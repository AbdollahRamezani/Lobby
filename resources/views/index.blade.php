@extends('master')

@section('title')
    Lobby
    @endsection

@section('main')
    <style>
    #btn-modal
    {
        border-radius: 100%;
        position: fixed;
        right: 10px;

    }
    </style>

    <div class="container" >
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card bg-white">
                    <div class="card-header">
                        <h1>
                          Lobby<h6 class="text-primary"></h6>
                        </h1>
                    </div>
                    <div class="card-body">

                        <ul class="list-group">

                            @foreach($messages as $message)

                            <li class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{$message->name}}</h5>
                                    <small>{{$message->created_at}}</small>
                                </div>
                                <p class="mb-1">{{$message->text}}</p>

                            </li>
                                @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button id="btn-modal" type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#exampleModalCenter">
        +
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form method="post" action="/add-message">
                       <input type="text" name="name" placeholder="Name">
                       <input type="text" name="text" placeholder="Text Message">
                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                       <input type="submit" value="SEND" class="btn btn-outline-success">

                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection