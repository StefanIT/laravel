<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    //
    public $post_id;
    public $post;
    public $description;
    public $user_id;
    public $created_at;
    public $updated_at;
    public $theme_id;
    public $closed;

    protected $table = "posts";
    public $timestamps = false;


    public function getPostsByTheme()
    {
    	$result = DB::table('posts')
    				->join('themes','posts.theme_id','=','themes.theme_id')
    				->join('users','posts.user_id','=','users.id')
    				->where('posts.theme_id','=',$this->theme_id)
    				->select('*','posts.description as desc')
    				->get();
    	return $result;
    }
    public function getUser()
    {
    	$result = DB::table('users')
    				->join('posts','users.id','=','posts.user_id')
    				->get();
    	return $result;
    }

    public function getAll()
    {
        $result = DB::table('posts')
                    ->get();
        return $result;
    }

    public function userPosted()
    {
    	$result = DB::table('users')
    				->join('posts','users.id','=','posts.user_id')
    				->join('pictures','users.picture_id','=','pictures.picture_id')
    				->join('roles','users.role_id','=','roles.role_id')
    				->where('posts.post_id','=',$this->post_id)
    				->get()
    				->first();
    	return $result;
    }
    public function closePost()
    {
        $result = DB::table('posts')
                    ->where('post_id','=',$this->post_id)
                    ->update(['closed'=>1]);
        return $result;
    }
    public function insert()
    {
        $result = DB::table('posts')
                    ->insertGetId([
                        'post' => $this->post,
                        'description' =>$this->description,
                        'user_id' => $this->user_id,
                        'created_at' => $this->created_at,
                        'theme_id' => $this->theme_id,
                    ]);
        return $result;
    }

    public function updatePost()
    {
        $result = DB::table('posts')
                    ->where('post_id',$this->post_id)
                    ->update([
                        'post' => $this->post,
                        'description' =>$this->description,
                        'user_id' => $this->user_id,
                        'updated_at' => $this->updated_at,
                        'theme_id' => $this->theme_id,
                        'closed' => $this->closed
                    ]);
        return $result;
    }

    public function selectOne()
    {
        $result = DB::table('posts')
                    ->where('post_id',$this->post_id)
                    ->get()
                    ->first();
        return $result;
    }

    public function delete()
    {
        $result = DB::table('posts')
                    ->where('post_id',$this->post_id)
                    ->delete();
        return $result;
    }
}
