<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Mail;
use App\Model\Blog;

class IndexController extends Controller
{
    public function index() {

    	// 所有记录
    	$blogs = Blog::where('status', '1')->orderBy('created_at', 'desc')->get();

    	for($i = 0; $i < count($blogs); $i++ ) {

    		$body = $blogs[$i]->body;
            $abs = mb_substr( strip_tags($body),0,400,"utf-8");
    		// 博客摘要
    		$blogs[$i]->abstract = $abs;
    	}

    	return view('Index/index', ['blogs' => $blogs]);
    }

    public function detail($id) {

    	$blog = Blog::where('id', $id)->where('status','1')->get();

    	return view('Index/detail', ['blog' => $blog[0]]);
    }

    public function archive() {
        $blogs = Blog::where('status', '1')->select('id','title','category','created_at','type')
            ->orderBy('created_at', 'desc')->get();

        $n = 0;
        $m = 0;
        
        $types = DB::table('category')->where('status', '1')->get();

        if(count($blogs) === 0) {
            return view('Index/archive',['date_sum' => [],'archive_blog' => [],'types' => $types]);
        }

        for($i = 0; $i < count($blogs); $i++ ) {

            $created_time = $blogs[$i]->created_at;
            
            $timestamp = strtotime($created_time);
            $mYear = date('Y', $timestamp);
            $mMonth = date('m', $timestamp);

            if($i === 0) {
                $cur_year = $mYear;
                $cur_month = $mMonth;
            }

            if($mYear === $cur_year && $mMonth === $cur_month) {
                $b['id'] = $blogs[$i]->id;
                $b['title'] = $blogs[$i]->title;
                $b['category'] = $blogs[$i]->category;
                $b['type'] = $blogs[$i]->type;

                $blog_date[$n++] = $b;
            }
            else {
                $archive_blog[$cur_year.''. $cur_month] = $blog_date;
                $date_sum[$m++] = $cur_year.''. $cur_month;
                unset($blog_date);
                $n = 0; 
                $cur_year = $mYear;
                $cur_month = $mMonth;

                $b['id'] = $blogs[$i]->id;
                $b['title'] = $blogs[$i]->title;
                $b['category'] = $blogs[$i]->category;
                $b['type'] = $blogs[$i]->type;

                $blog_date[$n++] = $b;
            }
        }

        $archive_blog[$cur_year.''. $cur_month] = $blog_date;
        $date_sum[$m] = $cur_year.''. $cur_month;
       

        return view('Index/archive', ['archive_blog' => $archive_blog,'date_sum' => $date_sum,'types' => $types]);

    }

    public function resume() {

        $resume = DB::table('resume')->where('status', '1')->get();

        for($i = 0;$i < count($resume);$i++) {
            $personInfo[$resume[$i]->name] = $resume[$i]->value;
        }
        

        $firstLevel = DB::table('skill')->select('name','id')->where('status', '1')->where('level','1')->get();
        for($i = 0;$i < count($firstLevel);$i++) {
            $child = DB::table('skill')->select('name','score')->where('status', '1')->where('parent',$firstLevel[$i]->id)->get();

            $skill[$i]['name'] = $firstLevel[$i]->name;
            $skill[$i]['childSkill'] = $child;
        }

        // dd($skill);
        return view('Index/resume',['personInfo' => $personInfo,'skill' => $skill]);
    }

    public function contact() {
         return view('Index/contact');
    }

    public function mail() {
        $email = Input::get('email');
        $name = Input::get('name');
        $mess = Input::get('message');

        if(trim($email) === '' || trim($name) === '' || trim($mess) === '') {
             return redirect('contact')->with('message', '不能为空');
        }

        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if ( !preg_match( $pattern, $email ) )
        {
           return redirect('contact')->with('message', '邮箱格式不正确');
        }

        $myMail = DB::table('config')->where('name','my_mail')->where('status', '1')->get();
        $mailTitle = DB::table('config')->where('name','mail_title')->where('status', '1')->get();

        $data = ['email'=>$email, 'name'=>$name, 'mess'=>$mess];
        $temp = [ 'my_mail' => $myMail,'mail_title' => $mailTitle];

        Mail::send('Static/mail', $data, function($message) use($temp)
        {
            for($i = 0;$i < count($temp['my_mail']);$i++) {
                 $message->to($temp['my_mail'][$i]->value, 'Marco')->subject($temp['mail_title'][0]->value);
            }
        });

        return redirect()->back();

    }

    public function category($id) {

        $blogs = Blog::where('status', '1')->where('category',$id)->orderBy('created_at', 'desc')->get();

        for($i = 0; $i < count($blogs); $i++ ) {

            $body = $blogs[$i]->body;

            $abs = mb_substr( strip_tags($body),0,400,"utf-8");
            // 博客摘要
            $blogs[$i]->abstract = $abs;
          
        }

        return view('Index/category',['blogs' => $blogs]);
    }

    public function search() {

        $keyword = Input::get('keyword');
        $keyword = trim($keyword);

        if($keyword === '') {
            redirect()->back();
        }

        $blogs = Blog::where('status', '1')->where('body','like','%'.$keyword.'%')->orWhere('title','like','%'.$keyword.'%')->orderBy('created_at', 'desc')->get();

        for($i = 0; $i < count($blogs); $i++ ) {

            $body = $blogs[$i]->body;
            $abs = mb_substr( strip_tags($body),0,400,"utf-8");
            // 博客摘要
            $blogs[$i]->abstract = $abs;
        }

        return view('Index/index', ['blogs' => $blogs]);
    }
    
    public function welcome(){
        return view('welcome');
    }
}
