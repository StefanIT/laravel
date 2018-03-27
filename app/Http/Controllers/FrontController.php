<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Themes;
use App\Models\Posts;
use App\Models\Users;
use App\Models\Online;
use App\Models\Comments;
use App\Models\Pictures;
use App\Models\Questions;
use App\Models\Answers;




class FrontController extends BaseController
{
    //
    private $themes = null;
    public $base = null;

    public function __construct()
    {
    	parent::__construct();
    	$this->themes = new Themes();
    	$this->data['menus'] = BaseController::menus();
    }
    public function index()
    {
    	$categories = new Categories();
    	$this->data['categories'] = $categories->getAll();
    	$this->data['themes'] = $this->themes->getThemesAndLast();
    	return view('pages.home',$this->data);
	}


	public function author()
	{
		$question = new Questions();
		$answer = new Answers();

		$this->data['brojGlasova'] = $answer->brojGlasova();
		$this->data['questions'] = $question->getQuestions();
		return view('pages.author',$this->data);
	}

	public function insertAnswer(Request $request)
	{
		$question = new Questions();
		$question->answer_id = $request->get('thm_id');
		$question->user_id = $request->session()->get('user.0')->id;
		$question->question_id = $request->get('q_id');

		$provera = $question->userVoted();
		if($provera)
		{
			return "<div class='alert alert-danger'>Vec ste jednom glasali, Vas glas je ubelezen.</div>";
		}
		else
		{
			$res = $question->insertNumber();
			$rez = $question->insertUserVote();
			return $rez;
		}
	}

	public function singleCategory($id)
	{
		$this->themes->category_id = $id;
		$this->data['singleCategory'] = $this->themes->getThemesByCategory();
		return view('pages.singleCategory',$this->data);
	}
	public function themes($id)
	{
		$posts = new Posts();
		$posts->theme_id = $id;
		$this->data['postByTheme'] = $posts->getPostsByTheme();
		$this->data['themes'] = $this->themes->getThemesAndLast();
		return view('pages.postsByThemeId',$this->data);
	}
	public function singleThread($id)
	{
		$posts = new Posts();
		$posts->post_id = $id;
		$this->data['posts'] = $posts->userPosted();
		$com = new Comments();
		$com->post_id = $id;
		$this->data['comments'] = $com->comments();
		return view('pages.singleThread',$this->data);
	}

	public function galery()
	{
		$pictures = new Pictures();
		$this->data['pictures'] = $pictures->picturesOfUser();
		return view('pages.showUsers',$this->data);
	}

}
