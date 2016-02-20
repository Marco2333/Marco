<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\Blog;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //共享信息
        $newest = Blog::where('status', '1')->orderBy('created_at', 'desc')->select('id','title')->take(10)->get();

        $types = DB::table('category')->where('status', '1')->get();

        $links = DB::table('link')->where('status', '1')->get();

        $wise_words = DB::table('config')->where('status', '1')->where('name','wise_words')->get();
        $name = DB::table('config')->where('status', '1')->where('name','name')->get();
        $pre_name = DB::table('config')->where('status', '1')->where('name','pre_name')->get();
        $sub_title = DB::table('config')->where('status', '1')->where('name','sub_title')->get();

        view()->share(['newBlog' => $newest,'types' => $types,'links' => $links,'wise_words' => $wise_words,'name' => $name,'pre_name' => $pre_name,'sub_title' => $sub_title]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
