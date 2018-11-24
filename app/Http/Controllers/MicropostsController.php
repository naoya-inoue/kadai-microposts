<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\controllers\Controller;

class MicropostsController extends Controller
{
    /**
     * *Display a listing of resource.
     * 
     * @return /Illuminate\Http_Response
     */
     public function index()
     {
         $date =[];
         if (\Auth::check()) {
             $user = \Auth::user();
             $microposts = $user->microposts()->orderBy('creared_at', 'desc')->paginate(10);
             
             $date = [
                 'user'=> $user,
                 'microposts' => $microposts,
            ];
            $date += $this->counts($user);
            return view('users.show',$data);
         }else {
             return view('welcome');
         }
     }
     
     public function store(Request $request)
     {
         $this->validate($request, [
             'content' => 'required|max:191',
            ]);
             
             $request->user()->microposts()->create([
                 'content' => $request->content,
            ]);
            
     }
     
     public function destroy($id)
     {
         $micropost = \App\Micropost::find($id);
         
         if(\Auth::id() === $micropost->user_id) {
             $micropost->delete();
         }
         
         return redirect()->back();
     }
}
