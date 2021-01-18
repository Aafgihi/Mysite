<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PageC extends Controller
{

    public function __construct(){

     //   $this->middleware('Check')->except('about');

    }
    public function index(){

    $arts = Article::take(3)->orderBy('id','DESC')->get();
    return view('index', compact('arts'));

    }
    public function hello(){
        $message =__("Sorry don't Work Today");
        $user = \Auth::user();
        $option = ['nothing '=>'nothing','p'=>'problem'];
        return view('hello',compact('message','user','option'));

    }

    public function StoreUser(Request $request){

        $validdateData = $request->validate([
            'nameofsender' =>'required | max:6',
            'message' => 'required'
        ]);

        $request->session()->put('userName',$request->nameofsender);

        return __("Done");

    }

    public function about(Request $request){

       $user = $request->session()->get('userName','Your Name :)');

        return view('about',['userName' =>$user]);
    }
    public function Clear(Request $request){

        $request->session()->flush('userName');

        return redirect()->back();

    }
}
