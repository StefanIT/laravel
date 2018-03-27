<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    //
    protected $table = "categories";
    public $timestamps = false;

    public $category;
    public $category_id;

    public function getAll()
    {
    	$result = DB::table('categories')
    				->get();
    	return $result;
    }

    public function selectOne()
    {
    	$result = DB::table('categories')
    				->where('category_id',$this->category_id)
    				->get()
    				->first();
    	return $result;
    }

    public function insert()
    {
    	$result = DB::table('categories')
    				->insert([
    					'category' => $this->category
    				]);
    	return $result;
    }

    public function updateCat()
    {
    	$result = DB::table('categories')
    				->where('category_id',$this->category_id)
    				->update([
    					'category' => $this->category
    				]);
    	return $result;
    }

    public function delete()
    {
    	$result = DB::table('categories')
    				->where('category_id',$this->category_id)
    				->delete();
    	return $result;
    }
}
