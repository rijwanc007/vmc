<?php

namespace App\Http\Controllers\Frontend;

use App\Fashion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function Dashboard(){
        return view('dashboard');
    }
   public function Career(){
       return view('dashboard');
   }
   public function FashionTex(){
       return view('dashboard');
   }
   public function Calendar(){
       return view('dashboard');
   }
   public function Appointment(){
       return view('dashboard');
   }
   public function fashionTexStyle(){
       return view('dashboard');
   }
   public function fashionTexSocialMedia(){
       return view('dashboard');
   }
   public function FashionIndex(){
        $fashions = Fashion::orderBy('id','DESC')->get();
//        $fashions = Fashion::where('type','=','image')->orderBy('id','DESC')->get();
       return response()->json($fashions);
   }
}
