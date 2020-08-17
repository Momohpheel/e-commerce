@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <input type="text" placeholder="Search for Items" class="form-control">
    </div>
    <div class="col-sm-4"></div>
</div>
<br>
<div class="row">
    <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div>
                <a href="/"><button class="btn btn-information">Go Back</button></a>
            </div>
            <br>
            <div class="container">

            <div class="card" style="width: 100%;">
                <img src="{{asset("/storage/upload/git.png") }}" style="width: 30%;" class="img-responsive card-img-top" alt="...">
                <div class="card-body">
                <p class="card-text">{{$item->description}}. </p>
                <p class="card-text">Price:  N{{$item->price}}</p>
                <form action="/like/{{$item->id}}" method="post">@csrf <input type="submit" class="btn btn-default" value="Likes ({{$item->likes}})"></form>
                </div>

            </div>
            </div>

            <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <br><br>
                    <form action="/comment/{{$item->id}}" method="POST">
                        @csrf
                        <p>Make your comments here</p>
                        <textarea name="comment" style="width: 60%;">
                        </textarea><br>
                        <input type="submit" class="btn btn-danger" value="Comment" style="color: white;">
                    </form>

                </div>
                <div class="col-sm-4">
                    <!--if item is in cart already-->
                    @if($cart != null)
                    <br><br><br>
                    <input type="submit" class="btn btn-default" value="Added to your Cart" style="color: black;">

                    @else
                    <br><br><br>
                    <!--if item is not in cart yet-->
                    <form action="/cart/{{$item->id}}" method="POST">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Add to Cart" style="color: white;">
                    </form>
                    @endif
                </div>


            </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <br>

                        <h2>Comments</h2>
                        <table class="table">
                            {{-- @foreach($users as $user) --}}
                            @foreach($comments as $comment )

                            <tr>
                                {{-- <td>{{$user->name}}<br> --}}
                                  <td>  {{$comment->comment}}<br>
                                <small>{{$comment->created_at}}</small>
                            </td>
                                {{-- <td>{{$users->name}}</td> --}}
                                {{-- <td>{{$comment->users()->name}}</td> --}}
                            </tr>
                            @endforeach

                            {{-- @endforeach --}}

                        </table>
                    </div>
                </div>
            </div>
            </div>
            <br>

        <div class="col-sm-1"></div>



</div>
<br>
<p >You want to sell stuffs also? Click <a href="">here</a> to begin</p>

</div>

@endsection
