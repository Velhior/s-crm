<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
//include 'visitors.php';
use App\Status;
class ManageController extends Controller
{
    public function index(){
      $orders=Order::all();
      $allorders=count($orders);
      $norders=Order::where('status_id',1)->get();
      $cnorders=count($norders);
      return view ('admin.index')->withAllorders($allorders)->withCnorders($cnorders);      
    }
    
}
