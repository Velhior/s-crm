<?php

namespace App\Http\Controllers;

use App\FAQCategory;
use Illuminate\Http\Request;
use Session;

class FAQCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=FAQCategory::orderBy('id', 'DESC')->get();
        return view ('admin.faqscat.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.faqscat.create');
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
      $category = new FAQCategory;
      $category->name = $request->name;      
      $category->save();
      //$vendor->malfvendors()->sync($request->malfvendors,false);
      Session::flash('success','Категория успешно добавлена');
      return redirect()->route('faqscat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FAQCategory  $fAQCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FAQCategory $fAQCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FAQCategory  $fAQCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQCategory $fAQCategory)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FAQCategory  $fAQCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
      $category = FAQCategory::find($id);
      $category->name=$request->input('name');      
      $category->save();
      Session::flash('success', 'Категория обновлен успешно');
      return redirect()->route('faqscat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FAQCategory  $fAQCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = FAQCategory::find($id);      
        $category->delete();
        Session::flash('success','Категория успешно удалена');
        return redirect()->route('faqscat.index');
    }
}
