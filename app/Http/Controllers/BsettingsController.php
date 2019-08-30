<?php

namespace App\Http\Controllers;

use App\Bsettings;
use Illuminate\Http\Request;

class BsettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bsettings  $bsettings
     * @return \Illuminate\Http\Response
     */
    public function show(Bsettings $bsettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bsettings  $bsettings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bsettings=Bsettings::find($id);
        return view('admin.blogs.bsettings')->withBsettings($bsettings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bsettings  $bsettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bsettings=Bsettings::find($id);
        //Validate the data
        $this->validate($request, array(
          
        ));
        //Save the Data to the Database
        $bsettings=Bsettings::find($id);
        $bsettings->seo_title_mask = $request->input('seo_title_mask');
        $bsettings->seo_description_mask = $request->input('seo_description_mask');        
        $bsettings->save();
        Session::flash('success', 'Информация обновлена успешно');
        return redirect()->route('manage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bsettings  $bsettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bsettings $bsettings)
    {
        //
    }
}
