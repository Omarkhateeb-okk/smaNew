<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category =Category::all();
        return view('admin.category.index',compact('category'));

    }
    public function create()
    {
        return view('admin.category.create');

    }public function store(CategoryFormRequest $request)
    {
        $data=$request->validated();

        $category =new Category;
        $category->name =$data['name'];
        $category->description =$data['description'];

        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category/',$filename);
            $category->image= $filename;

        }
        $category->status =$request->Shown==true? '0':'1';
        $category->navbar =$request->navbar==true? '0':'1';
        $category->created_by =Auth::user()->id;
        $category->save();
        return redirect('admin/category')->with('message','category Added Successfully');

    }
    public function edit($category_id)
    {
        $category=Category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request , $category_id)
    {

        $data=$request->validated();

        $category = Category::find($category_id);
        $category->name =$data['name'];
        $category->description =$data['description'];

        if($request->hasfile('image')) {
            $destination='uploads/category/'.$category->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category/',$filename);
            $category->image= $filename;

        }
    $category->navbar =$request->navbar==true? '1':'0';
    $category->status =$request->Shown==true? '0':'1';
    $category->created_by =Auth::user()->id;
    $category->update();
    return redirect('admin/category')->with('message','category updated Successfully');

}
public function destroy($category_id)
{
    $category=Category::find($category_id);
    if($category)
    {
        $category->delete();
        return redirect('admin/category')->with('message','category Deleted Successfully');
    }
    else
    {
        return redirect('admin/category')->with('message','No Category Id Found');

    }

}


}
