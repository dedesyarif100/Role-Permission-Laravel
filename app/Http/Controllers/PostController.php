<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view posts', ['only' => ['index']]);
        $this->middleware('permission:create posts', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit posts', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete posts', ['only' => ['destroy']]);
        $this->middleware('permission:publish posts', ['only' => ['publish']]);
        $this->middleware('permission:unpublish posts', ['only' => ['unpublish']]);
    }

    public function viewForm(){
        return view('post');
    }

    public function validatePost(Request $request){
        // dd($request->title);
        $request->validate([
            'title' => "required",
            'body'  => 'required',
        ]);

        if ($request->title == 'dede' && $request->body == 'citra') {
            return '<div style="width: 50px; height: 30px; background-color: #00ff1a;">Success</div>';
        } else {
            return '<div style="width: 50px; height: 30px; background-color: #ff4d00;">Failed</div>';
        }
    }

    public function publish(int $id)
    {
        echo 'post berhasil dipublish';
    }

    public function unpublish(int $id)
    {
        echo 'post berhasil diunpublish';
    }

    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        echo 'Create';
    }

    public function store(Request $request)
    {
        echo 'Store';
    }

    public function edit(Request $request)
    {
        echo 'Edit';
    }

    public function update(Request $Request)
    {
        echo 'Update';
    }

    public function destroy(Request $request)
    {
        echo 'Destroy';
    }
}
