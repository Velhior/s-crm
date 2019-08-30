<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Bsettings;
use Session;
use Image;
use Storage;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Blog::orderBy('id', 'DESC')->get();
        return view('admin.blogs.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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
        'title'=>'required',
        //'model_slug'=>'required',
        //'title'=>'required|max:170',
        //'main_mage'=>'required|image'
      ));
      //Storing
      $blog = new Blog;
      $blog->title = $request->title;
      //$blog->published=$request->published;
      if($request->input('published')=='on'){
        $blog->published = 1;  
      }else{
        $blog->published = 0;
      }
      $blog->slug = $request->slug;
      $blog->seo_title = $request->seo_title;
      $blog->seo_description = $request->seo_description;
      $blog->description = $request->description;
      $blog->content = $request->content;

      if($request->hasFile('blog_image')){
        $image = $request->file('blog_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);
        $blog->blog_image = $filename;
      }

      
      $blog->save();      
      Session::flash('success','Пост успешно добавлен');
      return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $post = Blog::find($id);
        return view('admin.blogs.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
      //Save the Data to the Database
      $blog=Blog::find($blog->id);
      $blog->title=$request->input('title');
      $blog->slug=$request->input('slug');
      $blog->published=$request->input('published');
      $blog->seo_title=$request->input('seo_title');
      $blog->seo_description = $request->input('seo_description');
      $blog->description = $request->input('description');
      $blog->content = $request->input('content');

      if($request->hasFile('blog_image')){
        $image = $request->file('blog_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->save($location);
        $oldFilename = $blog->image;
        $blog->blog_image = $filename;
        Storage::delete($oldFilename);
      }

      $blog->save();
      Session::flash('success', 'Информация обновлена успешно');
      return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
      $blog = Blog::find($blog->id);      
      $blog->delete();
      Session::flash('success','Пост успешно удален');
      return redirect()->route('orders.index');
    }
}
