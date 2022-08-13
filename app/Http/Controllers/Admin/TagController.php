<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Models\tag;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class TagController extends Controller
{
    public function index()
    {
        $tag = tag::all();
        return view('admin.tag.index', compact('tag'));

    }

    public function create()
    {
        return view('admin.tag.create');

    }

    public function store(Request $request)
    {
        $validate=[
            'name'=>'required'
        ];

        $tag = new tag;
        $tag->name = $request['name'];
        $tag->save();
        return redirect('admin/tag')->with('message', 'tag Added Successfully');

    }

    public function edit($tag_id)
    {
        $tag = Category::find($tag_id);
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $tag_id)
    {
        $validate=[
            'name'=>'required'
        ];

        $tag = Category::find($tag_id);
        $tag->name = $request['name'];
        $tag->description = $request['description'];
        $tag->created_by = Auth::user()->id;
        $tag->update();
        return redirect('admin/tag')->with('message', 'tag updated Successfully');

    }

    public function destroy($tag_id)
    {
        $tag = tag::find($tag_id);
        if ($tag) {
            $tag->delete();
            return redirect('admin/tag')->with('message', 'tag Deleted Successfully');
        } else {
            return redirect('admin/category')->with('message', 'No Category Id Found');

        }

    }


}
