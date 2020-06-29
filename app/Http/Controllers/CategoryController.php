<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }



    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::where('parebt',0)->get();

        return view('category.create',compact('categories'));
    }

    /**
     * @param \App\Http\Requests\CategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create([
            'parebt' =>$request->input("parebt") ,
            'icon_class' => $request->input("icon_class"),
            'name' => $request->input("name"),
            'thumbnail' =>$this->SaveImage($request->file('thumbnail'),'images') ,
            'slug' => Str::lower($request->input("name")),
        ]);

        $request->session()->flash('category', $category->name);

        return redirect()->route('category.index');
    }

    public function SaveImage($photo,$folder){
        $file_extension= $photo->getClientOriginalExtension();
        $file_name=time().'.'.$file_extension;
        $path=$folder;
        $photo->move($path,$file_name);
        return $file_name;
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('parebt',0)->get();
        return view('category.edit', compact(['category','categories']));
    }

    /**
     * @param \App\Http\Requests\CategoryUpdateRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        if ($request->input('thumbnail')){
            $category->update([
                'parebt' =>$request->input("parebt") ,
                'icon_class' => $request->input("icon_class"),
                'name' => $request->input("name"),
                'thumbnail' =>$this->SaveImage($request->file('thumbnail'),'images') ,
                'slug' => Str::lower($request->input("name")),
            ]);
        }else{
            $category->update([
                'parebt' =>$request->input("parebt") ,
                'icon_class' => $request->input("icon_class"),
                'name' => $request->input("name"),
                'slug' => Str::lower($request->input("name")),
            ]);
        }
        $request->session()->flash('category', $category->name." has updated");
        return redirect()->route('category.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index');
    }
}
