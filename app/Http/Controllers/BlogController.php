<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psy\Util\Json;

class BlogController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new Blog();
        $id = $request->session()->get('user')->id_user;
        $this->data['userBlogs'] = $model->getUserBlogs($id);
        return view('pages.create_blog',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $rules = [
            'add_image_blog' => 'required|max:2000',
            'title_add' => 'required|min:3|max:100',
            'description_add' => 'required|max:100|min:10',
        ];
        $messages = [
            'title_add.required' => 'You must write the description'
        ];
        $request->validate($rules,$messages);
        $model = new Blog();
        $file = $request->file("add_image_blog")->getClientOriginalName();
        $destination = public_path() . '\images';
        $request->file('add_image_blog')->move($destination, $file);
        $model->image = $file;
        $model->title = $request->get("title_add");
        $model->description = $request->get("description_add");
        $model->id_user = $request->session()->get('user')->id_user;
        try {
            $model->insert();
            return redirect(route("home"))->with("success", "Blog successfully insert!");
        }
        catch (QueryException $exception){
            return redirect()->back()->with("error","An server error has occurred, please try again later.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return string
     */
    public function show($id)
    {
        try {
            $model = new Blog();
            $one = $model->getOneBlog($id);
            return Json::encode($one);
        }
        catch (QueryException $exception){
            Log::error("Error returned data " . $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Routing\Redirector
     *
     */
    public function update(Request $request)
    {
        $rules = [
            'update_image_blog' => 'nullable|max:2000',
            'titleUpdate' => 'required|min:3|max:100',
            'descriptionUpdate' => 'required|max:100|min:10',
        ];
        $messages = [
            'titleUpdate.required' => 'Title must be entered.',
            'descriptionUpdate.required' => 'Description must be entered.'
        ];
        $request->validate($rules,$messages);
        $model = new Blog();
        if($request->hasFile('update_image_blog')){
            try {
                $file = $request->file('update_image_blog')->getClientOriginalName();
                $dest = public_path() . '\images';
                $request->file('update_image_blog')->move($dest, $file);
                $model->image = $file;
                $model->title = $request->get("titleUpdate");
                $model->description = $request->get("descriptionUpdate");
                $model->id_update = $request->get("idUpdate");
                $model->update();
                return redirect(route("index"))->with('Success','Blog successfuly update with image');
            }
            catch (QueryException $exception){
                return \response(['message' => $exception->getMessage()],404);
            }
        }else{
            try {
                $model->title = $request->get("titleUpdate");
                $model->description = $request->get("descriptionUpdate");
                $model->id_update = $request->get("idUpdate");
                $model->update();
                return redirect(route("index"))->with('Success','Blog successfuly update without image');
            }
            catch (QueryException $exception){
                return \response(['message' => $exception->getMessage()],404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy(Request $request,$id)
    {
        try {
            $model = new Blog();
            $model->deleteBlog($id);
            $idUser = $request->session()->get('user')->id_user;
            $all = $model->getUserBlogs($idUser);
            return Json::encode($all);
        }
        catch (QueryException $exception){
            Log::error("Error deleting blog " . $exception->getMessage());
        }
    }
}
