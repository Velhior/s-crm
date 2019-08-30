<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
use Image;
use Storage;
class SettingsController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings=Setting::find($id);
        return view('admin.settings')->withSettings($settings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settings=Setting::find($id);
        //Validate the data
        $this->validate($request, array(
          'phone'=>'max:120',
          'contact_email'=>'max:120'
        ));
        //Save the Data to the Database
        $settings=Setting::find($id);
        $settings->email = $request->input('email');
        $settings->counter = $request->input('counter');
        $settings->phone = $request->input('phone');
        $settings->contact_email = $request->input('contact_email');
        $settings->contact_map = $request->input('contact_map');
        //$settings->logo = $request->input('logo');
        if($request->hasFile('logo')){
            $image = $request->file('logo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);
            $oldFilename = $settings->image;
            $settings->logo = $filename;
            Storage::delete($oldFilename);
          }
        $settings->social_vk = $request->input('social_vk');
        $settings->social_fb = $request->input('social_fb');
        $settings->social_inst = $request->input('social_inst');
        $settings->social_telegramm = $request->input('social_telegramm');
        $settings->social_viber = $request->input('social_viber');
        $settings->social_youtube = $request->input('social_youtube');
        $settings->social_wup = $request->input('social_wup');
        $settings->social_skype = $request->input('social_skype');
        $settings->social_tw = $request->input('social_tw');
        $settings->save();
        Session::flash('success', 'Информация обновлена успешно');
        return redirect()->route('manage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
