@extends('layouts.app')

@section('content')


<br>
<div class="row">
    <div class="col-sm-1"></div>
<div class="container">
    @if($items != 0)
    @foreach($items as $item)
        <div class="col-sm-10">
            <div class="container">
                <a href="/item/{{$item->id}}" style="text-decoration: none;">
                    <div class="card" style="width: 13rem;">

                        <img src="{{asset("/storage/upload/git.png") }}" class="img-responsive card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-text">{{$item->name}}<br>N{{$item->price}} . {{$item->likes}}likes</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-2">
                            <form action="#" method="POST">
                            @csrf
                            <input type="submit" value="Remove" class="btn btn-danger btn-sm">
                        </form>
                            </div>


                        </div>
                      </div>
                    </a>
            <br>
            <input type="submit" value="Buy Item" class="btn btn-warning">
            </div>
            <br>
        </div>
    @endforeach
    @else
    <div class="col-sm-10">
        <div class="container">
            <h1>Nothing is in your Cart yet! Thank you fr choosing us!</h1>
        </div>
    </div>
    @endif
    <div class="col-sm-1"></div>




<p >You want to sell stuffs also? Click <a href="">here</a> to begin</p>
</div>
</div>


@endsection
