<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function cardList(){
        $cards = Card::all();
        return view('admin.pages.card.cardlist',compact('cards'));
    }

    public function cardDelete(Card $card){
        $card->delete();
        return redirect()->back();
    }
}
