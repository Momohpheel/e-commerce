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
    <div class="col-sm-4">
        @if($user->is_super == 1)
        <table>
            <tr >
                <td style="border: 1px solid grey; "><a style="text-decoration: none;" href="/super-user/add-item">Sell Products</a></td>
                    <td style="border: 1px solid grey;"><a style="text-decoration: none;" href="/super-user/items">Check Items</a></td>
                        <td style="border: 1px solid grey;"><a  style="text-decoration: none;"href="#">Ordered Items</a></td>
                            {{-- <td style="border: 1px solid grey;"><a style="text-decoration: none;" href="filter/above_50000">Above 50,000</a></td> --}}
            </tr>
        </table>
        @endif
    </div>
    <div class="col-sm-4">
      </div>
    <div class="col-sm-4">
        <table>
            <tr>
                <th>Filter : </th>
                <td style="border: 1px solid grey; "><a style="text-decoration: none;" href="/">All</a></td>
                <td style="border: 1px solid grey; "><a style="text-decoration: none;" href="/filter/recent">Recent</a></td>
                    <td style="border: 1px solid grey;"><a style="text-decoration: none;" href="/filter/older">Older</a></td>
                        <td style="border: 1px solid grey;"><a  style="text-decoration: none;"href="/filter/below_50000">Below 50,000</a></td>
                            <td style="border: 1px solid grey;"><a style="text-decoration: none;" href="/filter/above_50000">Above 50,000</a></td>
            </tr>
        </table>
    </div>
</div>
<br>
<div class="row">

    <div class="col-2">
        <div class="container">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              {{-- <img src={{asset("/storage/image/{$profile->image}") }}  style="width:100%" class="rounded float-left" alt="profile_pic"/> --}}
              <br>
              <h3>Category</h3>
              <a class="nav-link active"   href="/"   aria-selected="true">All</a>
              <a class="nav-link "   href="/category/gadgets"   aria-selected="false">Gadgets</a>
              <a class="nav-link"   href="/category/home_appliances"   aria-selected="false">Home Applicances</a>
              <a class="nav-link"   href="/category/men_fashion"   aria-selected="false">Mens Fashion</a>
              <a class="nav-link"   href="/category/women_fashion"   aria-selected="true">Womens Fashion</a>
              <a class="nav-link"   href="/category/women_fashion"   aria-selected="true">Womens Fashion</a>
            </div>
            </div>


          </div>

<div class="col-10">
    <div class="row">
    @foreach($items as $item)

        <div class="col-3">
            <div class="container">
                <a href="/item/{{$item->id}}" style="text-decoration: none;">
                    <div class="card" style="width: 13rem;">
                        <img src="{{asset("/storage/upload/git.png") }}" class="img-responsive card-img-top" alt="...">
                        <div class="card-body">
                        <p class="card-text">{{$item->name}}<br>N{{$item->price}} . {{$item->likes}}likes</p>
                        </div>
                      </div>
                    </a>
            </div>
            <br>
        </div>
    @endforeach
</div>

</div>
</div>

@if($user->is_super == 0)
<p >You want to sell stuffs also? Click <a href="/super">here</a> to begin</p>
@endif
</div>

@endsection
