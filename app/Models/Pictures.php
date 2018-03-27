<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pictures extends Model
{
	public $alt;
	public $path;
	public $comment_id;

    public $picture_id;
    public $user_id;

    public function allPictures()
    {
        $result = DB::table('pictures')
                    ->join('users','pictures.picture_id','users.picture_id')
                    ->get();
        return $result;
    }
    public function allOfThem()
    {
        $result = DB::table('pictures')
                    ->leftJoin('users','pictures.picture_id','users.picture_id')
                    ->select('*','pictures.picture_id as pic_id')
                    ->get();
        return $result;
    }

    public function picturesOfUser()
    {
        $result = DB::table('pictures')
                    ->join('users','pictures.picture_id','users.picture_id')
                    ->join('roles','users.role_id','roles.role_id')
                    ->get();
        return $result;
    }

	public function savePicture()
    {
        $picture_id = DB::table('pictures')
                        ->insertGetId([
                            'alt' => 'New User',
                            'path' => $this->path,
                            'comment_id' => $this->comment_id
                        ]);
        return $picture_id;
    }

    public function selectPicture()
    {
        $result = DB::table('pictures')
                    ->join('users','pictures.picture_id','users.picture_id')
                    ->where('users.id',$this->user_id)
                    ->get()
                    ->first();
        return $result;
    }

     public function selectOne()
    {
        $result = DB::table('pictures')
                    ->join('users','pictures.picture_id','users.picture_id')
                    ->where('pictures.picture_id','=',$this->picture_id)
                    ->select('*','pictures.picture_id as pic_id')
                    ->get()
                    ->first();
        return $result;
    }


    public function deletePicture()
    {
        return DB::table('pictures')
                ->where('picture_id',$this->picture_id)
                ->delete();
    }
}