<?php

namespace App\Http\Controllers;

use DB;
use Input;
use App\Model\Blog;

class AdminController extends Controller
{
    public function index() {

    	// 所有记录
    	return view('Admin/index');
    }

    public function submitBlog() {


        $blog = Input::get('blog');
        $title = Input::get('title');
        $keywords = Input::get('keywords');
        $theme = Input::get('theme');
        $type = Input::get('type');

        $data = [
            'title' => $title,
            'body' => $blog,
            'tag' => $keywords,
            'category' => $theme,
            'type' => $type,
            'created_at' => date('Y-m-d H:i:s')
        ];

        // DB::table('blog')->insert($data);
        Blog::insert($data);

        return redirect()->back();
        
    }

    public function toLogin() {
        return view('Admin/index');
    }

    public function logout() {
        session('userid',null);
        return redirect("/login");
    }

    public function newBlog() {
        $themes = DB::table('category')->select('id','theme')->where('status','1')->get();
        return view('Admin/newBlog',['themes' => $themes]);
    }

}
