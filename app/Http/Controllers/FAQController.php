<?php

namespace App\Http\Controllers;

use App\FAQ;
use Session;
use App\FAQCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $faqs=FAQ::orderBy('id', 'DESC')->get();
        return view('admin.faqs.index')->withFaqs($faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=FAQCategory::all();
        return view('admin.faqs.create')->withCategories($categories);
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
        'faq_name'=>'required',
        'faq_text'=>'required',
        //'title'=>'required|max:170',
        //'main_mage'=>'required|image'
      ));
      //Storing
      $faq = new FAQ;
      $faq->faq_name = $request->faq_name;
      $faq->faq_text = $request->faq_text;
      $faq->faq_category_id = $request->faq_category_id;
      $faq->save();
      //$vendor->malfvendors()->sync($request->malfvendors,false);
      Session::flash('success','FAQ успешно добавлен');
      return redirect()->route('faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $categories=FAQCategory::all();      
        $faq=FAQ::find($id);
        return view('admin.faqs.edit')->withFaq($faq)->withCategories($categories);
        Session::flash('success','FAQ успешно обновлен');
        return redirect()->route('faqs.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $faq=FAQ::find($id);      
      $faq->faq_name = $request->faq_name;
      $faq->faq_text = $request->faq_text;
      $faq->faq_category_id = $request->faq_category_id;
      $faq->save();
      Session::flash('success', 'Информация обновлена успешно');
      return redirect()->route('faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $fAQ)
    {
        $faq = FAQ::find($faq->id);      
        $faq->delete();
        Session::flash('success','FAQ успешно удален');
        return redirect()->route('faqs.index');
    }
}
