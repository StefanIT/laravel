<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;
use App\Models\Online;
use Session;

class BaseController extends Controller
{
    //
    protected $data = [];
    public function __construct()
    {
        $this->data['registered'] = Online::registered()->count();
    }

    public static function menus()
    {
    	$menu = new Menus();
    	if(Session::has('user'))
    	{
	    	$role_id = Session::get('user.0')->role_id;
	    	$menu->id = $role_id;
	    	return $menu->getMenues();
    	}
    	else
    	{
            $menu->id = 0;
    		return $menu->getMenues();
    	}
    }
}
