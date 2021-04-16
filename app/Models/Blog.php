<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class Blog
{
    private $table = "blogs";
    public $title;
    public $description;
    public $image;
    public $id_user;
    public $id_update;

    public function insert(){
        return DB::table($this->table)
            ->insertGetId([
                'image' => $this->image,
                'title' => $this->title,
                'description' => $this->description,
                'approved' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'id_user' => $this->id_user
            ]);
    }
    public function update(){
        $updateData = [
            'title' => $this->title,
            'description' => $this->description
        ];
        if($this->image == null){
            return DB::table($this->table)
                ->where('id_blog','=', $this->id_update)
                ->update($updateData);
        }
        return DB::table($this->table)
            ->where('id_blog','=', $this->id_update)
            ->update(['image' => $this->image,'title' => $this->title,'description' => $this->description]);
    }
    public function deleteBlog($id){
        return DB::table('blogs')
            ->where('id_blog','=',$id)
            ->delete();
    }
    public function allowedBlogs(){
        return DB::table('blogs AS b')
            ->select('b.id_blog','b.title','b.image','b.description','b.approved','b.created_at','u.first_name','u.last_name')
            ->join('users AS u','b.id_user','=','u.id_user')
            ->where('b.approved','=',1)
            ->get();
    }
    public function notAllowedBlogs(){
        return DB::table('blogs AS b')
            ->select('b.id_blog','b.title','b.image','b.description','b.approved','b.created_at','u.first_name','u.last_name')
            ->join('users AS u','b.id_user','=','u.id_user')
            ->where('b.approved','=',0)
            ->get();
    }
    public function updateBlog($id){
        return DB::table('blogs')
            ->where('id_blog','=',$id)
            ->update(['approved' => 1]);
    }
    public function getUserBlogs($id){
        return DB::table('blogs AS b')
            ->select('b.id_blog','b.title','b.image','b.description','b.created_at','u.first_name','u.last_name')
            ->join('users AS u','b.id_user','=','u.id_user')
            ->where('b.id_user','=',$id)
            ->get();
    }
    public function getOneBlog($id){
        return DB::table('blogs AS b')
            ->select('b.id_blog','b.title','b.image','b.description','u.first_name','u.last_name')
            ->join('users AS u','b.id_user','=','u.id_user')
            ->where('b.id_blog','=',$id)
            ->get();
    }
    public function getAllBlog(){
        return DB::table('blogs')
            ->select('id_blog','title','image','description','approved')
            ->where('approved','=',1)
            ->get();
    }
}
