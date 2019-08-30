<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Session;
use Image;
use Storage;
use Mail;
use App\Status;
use App\Setting;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$statuses=Status::all();
        $orders=Order::orderBy('id', 'DESC')->get();
        return view('admin.orders.index')->withOrders($orders);//->withStatuses($statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses=Status::all();
        return view('admin.orders.create')->withStatuses($statuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
      $this->validate($request, array(
        //'name'=>'required',
        //'model_slug'=>'required',
        //'title'=>'required|max:170',
        //'main_mage'=>'required|image'
      ));
      //Storing
      $order = new Order;
      $order->name = $request->name;
      $order->last_name = $request->last_name;
      $order->email = $request->email;
      $order->phone = $request->phone;
      $order->order_detail = $request->order_detail;
      $order->order_comment = $request->order_comment;                      
      if($request->hasFile('order_file')){
        $image = $request->file('order_file');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);
      }
      $order->order_file = $filename;
      $order->save();
      //$vendor->malfvendors()->sync($request->malfvendors,false);
      Session::flash('success','Заказ успешно добавлен');
      return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order = Order::find($order->id);
        return view('admin.orders.show')->withOrder($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $statuses=Status::all();      
        $order=Order::find($order->id);
        return view('admin.orders.edit')->withOrder($order)->withStatuses($statuses);
        Session::flash('success','Заказ успешно обновлен');
        return redirect()->route('orders.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
      $order=Order::find($order->id);
      //Save the Data to the Database
      $order=Order::find($order->id);
      $order->name=$request->input('name');
      $order->last_name=$request->input('last_name');
      $order->email = $request->input('email');
      $order->phone = $request->input('phone');
      $order->status_id = $request->input('status_id');
      $order->order_detail = $request->input('order_detail');
      $order->order_comment = $request->input('order_comment');
      if($request->hasFile('order_file')){
        $image = $request->file('order_file');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);
        $oldFilename = $order->image;
        $order->order_file = $filename;
        Storage::delete($oldFilename);
      }
      $order->save();
      Session::flash('success', 'Информация обновлена успешно');
      return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
      $order = Order::find($order->id);      
      $order->delete();
      Session::flash('success','Заказ успешно удален');
      return redirect()->route('orders.index');
    }
    public function getContact(){
      return view ('contact');
    }
    public function postContact(Request $request){
      
      $this->validate($request,['email'=>'required|email','name'=>'min:3|max:120']);
      $data = array(
        'order_email' => $request->email,
        'name' => $request->name,
        'phone' => $request->phone
      );
      Mail::send('emails.contact', $data, function ($message) use ($data){
          $settings = Setting::where('id','=','1')->first();
          $message->from('shamanyara@gmail.com', 'John Dosherak');
          //$message->sender('john@johndoe.com', 'John Doe');
          $message->to($settings['email'], 'John Doe');
          //$message->cc('john@johndoe.com', 'John Doe');
          //$message->bcc('john@johndoe.com', 'John Doe');
          //$message->replyTo('john@johndoe.com', 'John Doe');
          $message->subject('Новый заказ');
          //$message->priority(3);
          //$message->attach('pathToFile');
      });
      $order = new Order;
      $order->name = $request->name;
      //$order->last_name = $request->last_name;
      $order->email = $request->email;
      $order->phone = $request->phone;
      $order->save();
      Session::flash('success', 'Заявка успешно отправлена');
      return redirect()->route('contact_get');
    }
}
