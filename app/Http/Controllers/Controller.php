<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

 class Controller extends BaseController
{
    public function Transactions(){
        return view('/transactions');
    }
    // public function Logout(){
    //     return view('/login');
    // }
    public function Services(){
        return view('/services');
    }
    public function Dashboard(){
        return view('/index');
    }
    
    public function Laporan(){
        return view('/laporan');
     }
}
 