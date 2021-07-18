<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

class BlogController extends Controller
{
    public function home()
    {

        $blogs = Blog::all();
        //dd($blogs);

        return view('user.home',compact('blogs'));
    }


    public function show($id)
    {

    }

    public function create()
    {
        return view('user.create');
    }

    public function store(BlogRequest $request )
    {

        $user = User::findOrFail(Auth::id());
        try{
            $blog = new Blog();
            $blog->title = $request->input('title');
            $blog->content = $request->input('content');
            $blog->user_id = $user->id;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->storeAs('public/images',$filename); 
                $blog->image = $filename;
            }
            $blog->save();
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

        \Session::flash('err_msg', '記事を登録しました');
        return redirect()->route('user.home');
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
        $blog = Blog::findOrFail($id);

        if ( $blog->image ) {
            $path ='public/images/'.$blog->image;
            if(Storage::exists($path))
            {
                Storage::delete($path);
            }
        $blog->delete();

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('user.home'));
        }
    }
}