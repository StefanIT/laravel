<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menus extends Model
{
    //
    public $id;
    public $menu;
    public $link;
    public $opis;
    public $parent_id;

    protected $table = "menus";
    protected $timestemps = false;

    public function getMenues()
    {
    	$result = DB::table('menus')
    				->join('menus_role','menus.menu_id','=','menus_role.menu_id')
    				->where('menus_role.role_id','=',$this->id)
    				->select('*')
    				->get();
    	return $result;
    }
    public function getAll()
    {
    	$result = DB::table('menus')
    				->get();
    	return $result;
    }

    public function find()
    {
        $result = DB::table('menus')
                    ->where('menu_id',$this->id)
                    ->get()
                    ->first();

        return $result;
    }

    public function saveMenu()
    {
        $result = DB::table('menus')
                    ->insert([
                        'menu' => $this->menu,
                        'link' => $this->link,
                        'opis' => $this->opis,
                        'a_class' => 'act',
                        'li_class' => '',
                        'parent_id' => $this->parent_id
                    ]);
        return $result;
    }

    public function updateMenu()
    {
        $result = DB::table('menus')
                    ->where('menu_id',$this->id)
                    ->update([
                        'menu' => $this->menu,
                        'link' => $this->link,
                        'opis' => $this->opis,
                        'parent_id' => $this->parent_id
                    ]);
        return $result;
    }
    public function delete()
    {
        return DB::table('menus')
                ->where('menu_id',$this->id)
                ->delete();
    }
}
