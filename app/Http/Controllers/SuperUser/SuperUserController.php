<?php

namespace App\Http\Controllers\SuperUser;

use Illuminate\Http\Request;
use App\Model\Item;
use App\Http\Controllers\Controller;

class SuperUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


        public function getaddItem(){
            return view('superUser.addItem');
        }
    public function addItem(Request $request){
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            //'image' => 'required|string',
            'image' => 'required|image|max:2000|mimes:png,jpg|nullable',
            'type' => 'required|string'
        ]);

        if (request()->hasFile('image')){
            $filename = request()->file('image')->getClientOriginalName();
            $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
            $fileext = request()->file('image')->getClientOriginalExtension();
            $image = $filename_without_ext.'_'.time().'.'.$fileext;
            $path  = request()->file('image')->storeAs('public/upload', $image);
        }



            $item = new Item;
            $item->name = $validated['name'];
            $item->description = $validated['description'];
            $item->price = $validated['price'];
            $item->image = $image;
            $item->likes = 0;
            $item->type = $validated['type'];
            $item->user_id = auth()->user()->id; //auth()->user()->id;
            $item->save();

            return "Success";
    }


    public function viewItems(){

        $items = Item::where('user_id', auth()->user()->id)->get();//auth()->user()->id;
        return view('superUser.viewItem')->with('items', $items);
    }


    public function viewBookedItems(){

    }

    public function deleteItem($id){
        $item = Item::where('id', $id)->first();
        $item->delete();
        return redirect('super-user/items');
    }

    public function updateItem(Request $request, $id){
        $item = Item::where('id', $id)->first();

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'image' => 'required|image|max:1999|mimes:png,jpeg,jpg'
        ]);

        if (request()->hasFile('image')){
            $filename = $validated['image']->getClientOriginalName();
            $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
            $fileext = $validated['image']->getClientOriginalExtension();
            $image = $filename_without_ext.'_'.time().'.'.$fileext;
            $path  = $validated['image']->storeAs('public/upload', $image);
        }

        return $image;
            $item = new Item;
            $item->name = $validated['name'];
            $item->description = $validated['description'];
            $item->price = $validated['price'];
            $item->image = $image;
            $item->like = 0;
            $item->user_id = auth()->user()->id;
            $item->save();

            return redirect('/super-user/add-item');
    }
}
