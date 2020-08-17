<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Model\Item;
use App\Model\Cart;
use App\Model\Comments;
use App\Model\Seller;
use App\Model\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $items = Item::all();
        $user = User::where('id', auth()->user()->id)->first(); //auth()->user()->id
        return view('user.index')->with(['items'=> $items, 'user'=>$user]);
    }

    public function view($id){
        $item = Item::where('id', $id)->first();
        $cart = Cart::where('item_id', $id)->where('user_id', auth()->user()->id)->first();//auth()->user()->id
        $comments = Comments::where('item_id', $id)->get();


        return view('user.view')->with([
            'item'=> $item,
            'cart' => $cart,
            'comments' => $comments,

            ]);
    }
    public function super(){
        return view('user.superForm');
    }

    public function addSeller(Request $request){

        $validated = $request->validate([
            'business_name' => 'string|required',
            'contact' => 'required|string',
            'address' => 'string|required'
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        $user->is_super = 1;
        $user->save();

        $seller = new Seller;
        $seller->bussiness_name = $validated['business_name'];
        $seller->contact = $validated['contact'];
        $seller->office_address = $validated['address'];
        $seller->user_id = auth()->user()->id;
        $seller->save();

        //send mail to seller on verification
        //Mail::to($user->email)->send(new RegisteredSeller);
        return redirect('/');

    }

    public function like($id){
        $item = Item::where('id', $id)->first();
        $likes = $item->likes;
        $item->likes = $likes+1;
        $item->save();

        return redirect('/item/'.$id);
    }

    public function filter($id){
        $user = User::where('id', auth()->user()->id)->first();
        if ($id == 'recent'){
            return "recent";
        }
        elseif ($id == 'older'){
            return "older";
        }
        elseif ($id == 'below_50000'){
           $items = Item::where('price' <= 50000)->get();
           return view('user.filteredpage')->with(['items'=> $items, 'user'=>$user]);
        }
        else{
            $items = Item::where('price' <= 50000)->get();
           return view('user.filteredpage')->with(['items'=> $items, 'user'=>$user]);
        }
    }

    public function category($id){
        $user = User::where('id', auth()->user()->id)->first(); //auth()->user()->id
        if ($id == 'gadgets'){
            $items = Item::where('type', 'Gadgets')->get();
            return view('user.filteredpage')->with(['items'=> $items, 'user'=>$user]);
        }
        elseif ($id == 'home_applicances'){
            $items = Item::where('type', 'Home Appliances')->get();
            return view('user.filteredpage')->with(['items'=> $items, 'user'=>$user]);
        }
        elseif ($id == 'men_fashion'){
            $items = Item::where('type', 'Men\'s Fashion')->get();
            return view('user.filteredpage')->with(['items'=> $items, 'user'=>$user]);
        }
        else{
            $items = Item::where('type', 'Women\'s Fashion')->get();
            return view('user.filteredpage')->with(['items'=> $items, 'user'=>$user]);
        }
    }



    public function addToCart($id){
        $item = Item::where('id', $id)->first();
        $cart = new Cart;
        $cart->user_id = auth()->user()->id;//auth()->user()->id;
        $cart->item_id = $item->id;
        $cart->save();

        return redirect('item/'.$item->id);
    }

    public function cart(){
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach($carts as $cart){
            $item[] = Item::where('id', $cart->item_id)->first();

        }


        return view('user.cart')->with([
                'items'=> $item
            ]);
    }

    public function comment(Request $request, $id){
        $item = Item::where('id', $id)->first();
        $validated = $request->validate([
            'comment' => 'required|string',
        ]);

            $comment = new Comments;
            $comment->user_id = auth()->user()->id;//auth()->user()->id;
            $comment->item_id = $item->id;
           $comment->comment = $validated['comment'];
            $comment->save();

            // $date = Comments::where('item_id', $id)->where('comment', $validated['comment'])->first();
            // $date->created_at = $date->created_at->diffForHumans();
            // $date->save();

            return redirect('item/'.$item->id);
    }


    public function buy(){

    }
}
