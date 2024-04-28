<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CardController extends Controller
{
    public function index(){
        $card['menu'] =Menu::get();

        return view('card.card');
    }
}
