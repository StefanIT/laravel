<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Themes;
use App\Models\Posts;
use Carbon\Carbon;

class PostController extends BaseController
{
    //
    private $base = null;

    public function __construct()
    {
        parent::__construct();
    	$this->data['menus'] = BaseController::menus();
    }


    public function show()
    {
    	$theme = new Themes();
    	$this->data['themes'] = $theme->getThemes();
    	return view('pages.createPost',$this->data);
    }
    public function insert(Request $request)
    {
    	$request->validate([
    		'title' => 'required|min:5|',
    		'description' => 'required'
    	]);

    	$post = new Posts();
    	$post->description = $request->get('description');
    	$post->post = $request->get('title');
    	$post->user_id = $request->session()->get('user')[0]->id;
    	$post->created_at = Carbon::now();
    	$post->theme_id = $request->get('theme');

    	try{
    		$rez = $post->insert();
    		if($rez)
    		{
    			return redirect()->back()->with('success','Post is created successfully.');
    		}
    		return redirect()->back()->with('error','Post does not created successfully.');
    	}
    	catch (Exception $ex)
    	{
    		\Log::error('Something went wrong'.$ex->getMessage());
    		return response(null,404);
    	}
    }
}
