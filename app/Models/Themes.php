<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Themes
{
    //
    public $theme_id;
    public $theme;
    public $category_id;
    public $description;
    public $question_id;

    public function getThemes()
    {
    	$result = DB::table('themes')
    				->get();
    	return $result;
    }

    public function getThemesAndLast()
    {
        $result = $this->getThemes();
            foreach ($result as $row) {
                $lastComment = null;
                $posts = DB::table('posts')
                            ->where('theme_id','=',$row->theme_id)
                            ->orderBy('created_at','desc')
                            ->get();
                if(count($posts) > 0)
                {
                    foreach ($posts as $post) {
                        $query = DB::table('comments')
                                        ->where('post_id',$post->post_id)
                                        ->orderBy('created_at','desc')
                                        ->first();
                        if(!empty($query))
                        {
                            if((empty($lastComment)) || ($query->created_at > $lastComment->created_at))
                            {
                                $lastComment = $query;
                            }
                        }
                    }
                    $lastPost = $posts[0];
                    if(!empty($lastComment))
                    {
                         if($lastPost->created_at > $lastComment->created_at)
                        {
                            $row->last = $lastPost;
                        }
                        else if($lastPost->created_at < $lastComment->created_at)
                        {
                            $row->last = $lastComment;
                        }
                        else
                        {
                            $row->last = null;
                        }
                    }
                    else
                    {
                        $row->last = $lastPost;
                    }
                }
                else
                {
                    $row->last = null;
                }
            }

        return $result;

    }

    public function getThemesByCategory()
    {
    	$result = DB::table('themes')
    				->join('categories','themes.category_id','=','categories.category_id')
    				->where('themes.category_id','=',$this->category_id)
    				->get();
    	return $result;
    }




    public function insert()
    {
        $result = DB::table('themes')
                    ->insertGetId([
                        'theme' => $this->theme,
                        'description' => $this->description,
                        'category_id' => $this->category_id
                    ]);

        return $result;
    }

    public function delete()
    {
        $result = DB::table('themes')
                    ->where('theme_id',$this->theme_id)
                    ->delete();
        return $result;
    }

    public function selectOne()
    {
        $result = DB::table('themes')
                    ->where('theme_id',$this->theme_id)
                    ->get()
                    ->first();
        return $result;
    }

    public function update()
    {
        $result = DB::table('themes')
                    ->where('theme_id',$this->theme_id)
                    ->update([
                        'theme' => $this->theme,
                        'description' => $this->description,
                        'category_id' => $this->category_id
                    ]);

        return $result;
    }
}
