<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Cource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function Cart(User $user)
    {
        if (Auth::check() && Auth::id() == $user->id) {
            $carts = Card::where("user_id", $user->id)->with('cources')->get();
            return view("site.pages.cart.cart", compact("user", "carts"));
        }
        return redirect("/login");
    }

    public function CartCreate(Cource $cource)
    {
        if (Auth::check()) {
            Card::create([
                "user_id" => Auth::id(),
                "cource_id" => $cource->id
            ]);
            return redirect()->route("cart", Auth::id());
        }
        return redirect("/login");
    }

    public function CartDelete(Card $card)
    {
        if (Auth::check() && Auth::id() == $card->user->id) {
            $card->delete();
            return back();
        }
        return redirect("/");
    }
}
