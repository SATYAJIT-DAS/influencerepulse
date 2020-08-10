<?php

namespace App\Http\Controllers\Buyer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    public function index(){
        $role=auth()->user()->role->name;
        return view('backend.buyer.faq',compact('role'));
    }
}
