<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\Models\Blog;
use App\Models\Admin\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class AdminController extends FrontController
{
    public function index(){
        $modelUser = new User();
        $modelBlog = new Blog();
        $this->data['allUsers'] = $modelUser->getAllUser();
        $this->data['allowedBlogs'] = $modelBlog->allowedBlogs();
        $this->data['notAllowed'] = $modelBlog->notAllowedBlogs();
        return view('admin.pages.adminpage',$this->data);
    }
    public function destroyBlog($id){
        try {
            $model = new Blog();
            $model->deleteBlog($id);
            $all = $model->allowedBlogs();
            return Json::encode($all);
        }
        catch (QueryException $exception){
            Log::error("Error deleting blog " . $exception->getMessage());
        }
    }
    public function updateBlog($id){
        try {
            $model = new Blog();
            $model->updateBlog($id);
            $notAllowed = $model->notAllowedBlogs();
            return Json::encode($notAllowed);
        }
        catch (QueryException $exception){
            Log::error("Error update blog " . $exception->getMessage());
        }
    }
    public function deleteNotAllowedBlog($id){
        try {
            $model = new Blog();
            $model->deleteBlog($id);
            $all = $model->notAllowedBlogs();
            return Json::encode($all);
        }
        catch (QueryException $exception){
            Log::error("Error deleting blog " . $exception->getMessage());
        }
    }
}
