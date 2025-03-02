<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WishListItem;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function create()
    {
        $wishListItems = WishListItem::where('user_id', auth()->id())->orderBy('created_at', 'desc')->paginate(6);
        return view('wishlist', compact('wishListItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'target_amount' => 'required|numeric',
        ]);

        WishListItem::create([
            'name' => $request->name,
            'target_amount' => $request->target_amount,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('wishlist')->with('success', 'Item added successfully.');
    }
}
