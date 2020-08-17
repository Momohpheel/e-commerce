@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
    <h3>Hey Fav! Here are your items</h3>
    </div>
    <div class="col-sm-4"></div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
        <div>
            <a href="/"><button class="btn btn-information">Go Back</button></a>
        </div>
    </div>
    <div class="col-sm-4">
      </div>
    <div class="col-sm-4">
        <table>
            <tr >
                <td style="border: 1px solid grey;"><a href="#">Recent</a></td>
                    <td style="border: 1px solid grey;"><a href="#">Older</a></td>
                        <td style="border: 1px solid grey;"><a href="#">Below 50,000</a></td>
                            <td style="border: 1px solid grey;"><a href="#">Above 50,000</a></td>
            </tr>
        </table>
    </div>
</div>
<br>
<div class="row">

    @foreach($items as $item)
        <div class="col-sm-4">
            <div class="container">
            {{-- <a href="items/{{$item->id}}"> --}}
            <div class="card" style="width: 18rem;">
                <img src="{{asset("/storage/upload/git.png") }}" class="img-responsive card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">{{$item->name}}<br>N{{$item->price}} . {{$item->likes}}likes</p>
                </div>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                    <form action="items/delete/{{$item->id}}" method="POST">
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
                    </div>
                    <div class="col-sm-2">
                    <form action="items/update/{{$item->id}}" method="get">
                    @csrf
                    <input type="submit" value="Edit" class="btn btn-primary btn-sm">
                </form>
                    </div>

                </div>
              </div>
            {{-- </a> --}}
            </div>
            <br>
        </div>
    @endforeach


</div>


</div>

@endsection
