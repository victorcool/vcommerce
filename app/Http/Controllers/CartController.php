<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike = Product::inRandomOrder()->take(4)->get();
        return view('market.pages.cart')->with('mightAlsoLike',$mightAlsoLike);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicate = Cart::search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id === $request->id;
        });

        if ($duplicate->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already in your cart');
        }
      

        // return Cart::content();
        Cart::add($request->id, $request->name, 1, $request->price,['size' => 'large'])->associate('App\Product');

        return redirect()->route('cart.index')->with('success', 'Item added to cart');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified product qty in cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       if (Cart::instance()->update($id,$request->qty)) {
           session()->flash('success','Quantity updated successfully!');
           response()->json(['success' => true]);
           echo '200';
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success','Item has been removed');
    }

    public function empty()
    {
        Cart::destroy();
           return redirect()->back()->with('success','Cart has been cleared');
    }

    public function emptyWishlist()
    {
        Cart::instance('saveForLater')->destroy();
           return redirect()->back()->with('success','wishItem has been romoved');
    }

     /**
     * switch shopping cart item to save for later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($id)
    {
        
        $item = Cart::instance('default')->get($id);

        Cart::instance('default')->remove($id);

        $duplicate = Cart::instance('saveForLater')->search(function ($saveForLaterItem, $rowId) use($id) {
            return $rowId === $id;
        });

        if ($duplicate->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already saved');
        }
       

        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)
        ->associate('App\Product');

        return redirect()->route('cart.index')->with('success', 'Item has been saved for later!');
    }

        /**
     * switch shopping cart item to save for later.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveToCart($id)
    {
        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $duplicate = Cart::instance('saveForLater')->search(function ($saveForLaterItem, $rowId) use($id) {
            return $saveForLaterItem->id === $id;
        });

        if ($duplicate->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success', 'Item is already in your cart');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
        ->associate('App\Product');

        return redirect()->route('cart.index')->with('success', 'Item has been removed from wishlist!');
    }

    
    public function destroyWishlist($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success','Item has been removed');
    }
}
