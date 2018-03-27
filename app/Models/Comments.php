<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comments extends Model
{
    //
    public $comment_id;
    public $text;
    public $created_at;
    public $updated_at;
    public $post_id;
    public $user_id;
    public $parent_id;

    public function comments()
    {
    	$result = DB::table('comments')
    				->join('users','comments.user_id','=','users.id')
    				->join('roles','users.role_id','=','roles.role_id')
    				->join('pictures','users.picture_id','=','pictures.picture_id')
    				->where('post_id','=',$this->post_id)
    				->select('*','comments.created_at as crt','comments.updated_at as upt','comments.comment_id as cm_id')
    				->orderBy('crt','asc')
    				->paginate(4);
    	return $result;
    }

    public function addComment()
    {
    	return DB::table('comments')
    				->insertGetId([
    					'text' => $this->text,
    					'created_at' => $this->created_at,
    					'user_id' => $this->user_id,
    					'post_id' => $this->post_id,
                        'parent_id' => $this->parent_id
    				]);
    }

    public function getComment()
    {
        $result = DB::table('comments')
                    ->join('users','comments.user_id','=','users.id')
                    ->join('roles','users.role_id','=','roles.role_id')
                    ->join('pictures','users.picture_id','=','pictures.picture_id')
                    ->where('comments.comment_id',$this->comment_id)
                    ->select('*','comments.created_at as crt','comments.updated_at as upt','comments.comment_id as cm_id')
                    ->get();

        return $result;
    }

    public function updateComment()
    {
        $result = DB::table('comments')
                    ->where('comment_id',$this->comment_id)
                    ->update([
                        'text' => $this->text,
                        'updated_at' => $this->updated_at
                    ]);
        return $result;
    }
}
