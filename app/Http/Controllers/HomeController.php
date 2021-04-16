<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends FrontController
{
    public function home(Request $request){
        $model = new Blog();
        $allBlog = $model->getAllBlog();
        $this->data['blogs'] = $allBlog;
        return view('pages.home',$this->data);
    }
    public function singlePage($id){
        $blogModel = new Blog();
        $getOneBlog = $blogModel->getOneBlog($id);
        $this->data['singleBlog'] = $getOneBlog;
        return view('pages.single_page',$this->data);
    }

}
