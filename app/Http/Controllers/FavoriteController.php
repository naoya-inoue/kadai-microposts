<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->add_fav($id);
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->un_fav($id);
        return redirect()->back();
    }
}
