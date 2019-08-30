<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;
use Session;
class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view ('admin.status.index')->withStatuses($statuses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.status.create');
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
        'name'=>'required',
        //'model_slug'=>'required',
        //'title'=>'required|max:170',
        //'main_mage'=>'required|image'
      ));
      //Storing
      $status = new Status;
      $status->name = $request->name;      
      $status->save();
      //$vendor->malfvendors()->sync($request->malfvendors,false);
      Session::flash('success','Статус успешно добавлен');
      return redirect()->route('statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
      //$order=Status::find($order->id);
      //Save the Data to the Database
      $status=Status::find($status->id);
      $status->name=$request->input('name');      
      $status->save();
      Session::flash('success', 'Статус обновлен успешно');
      return redirect()->route('statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        {
            $status = Status::find($status->id);      
            $status->delete();
            Session::flash('success','Статус успешно удален');
            return redirect()->route('statuses.index');
          }
    }
}
