<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Storage; 

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('index', ['blogs' => $blogs]);
    }


    public function show($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('index'));
        }
        return view('show', ['blog' => $blog]);
    }

    public function create()
    {
        return view('create_form');
    }

    public function store(BlogRequest $request)
    {
        $newBlog = new Blog();
        $newBlog->title = $request->input('title');
        $newBlog->content = $request->input('content');
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->storeAs('public/images',$filename); 
            $newBlog->image = $filename;
        }
        $newBlog->save();

        \Session::flash('err_msg', 'ブログを登録しました');
        return redirect()->route('index');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('index'));
        }
        return view('edit', ['blog' => $blog]);
        //return view('edit',compact('blog'));
    }

    public function update(Request $request,$id)
    {

        $edit = Blog::find($id);
        $edit->title = $request->input('title');
        $edit->content = $request->input('content');

        if ($request->hasfile('image')) {
            $path ='public/images/'.$edit->image;
            if(Storage::exists($path))
            {
                Storage::delete($path);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->storeAs('public/images',$filename);
            $edit->image = $filename;
        }
        $edit->update();


        \Session::flash('err_msg', 'ブログを更新しました');

        return redirect()->route('index');
    }

    public function delete($id)
    {
        $blogDelete = Blog::find($id);
        $blogDelete->delete();

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('index'));
    }
}