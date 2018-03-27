<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Pictures;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class ThreadController extends BaseController
{
    //


    public function __construct()
    {
    	parent::__construct();
    	$this->data['menus'] = BaseController::menus();

    }

	public function close($id)
	{
		$posts = new Posts();
		$posts->post_id = $id;
		$result = $posts->closePost();
		return $result;
	}

	public function getComments($id)
	{
		$com = new Comments();
		$com->comment_id = $id;
		$result = $com->getComment();
		return $result;
	}

	public function getComment($id)
	{
		$com = new Comments();
		$com->comment_id = $id;
		$this->data['comment'] = $com->getComment();
		return view('pages.edit_comm',$this->data);
	}

	public function insertComments(Request $request)
	{
		$com = new Comments();
		$com->created_at = "".$request->get("date")."";
		$com->text = $request->get("descr");
		$com->post_id = $request->get("id");
		$com->user_id = $request->session()->get('user.0')->id;
		if($request->has('parent_id'))
		{
			$com->parent_id = $request->get('parent_id');
		}
		try
		{
			$res = $com->addComment();
			return response(['id' => $res], 201);
		}
		catch(\Exception $e) {
            \Log::error("Greska pri unosu komentara " . $e->getMessage());
            return response(null, 422);
        }
	}

	public function replay($id)
	{
		$comm = new Comments();
		$comm->comment_id = $id;
		try
		{
			$rez = $comm->getComment();
			return $rez;
		}
		catch (Exception $ex)
		{
			\Log::error('Something went wrong'.$ex->getMessage());
			return response(null,400);
		}
	}

	public function updateComment(Request $request,$id)
	{
		$request->validate([
			'description' => 'required',
			'profilePicture' => 'mimes:jpg,jpeg,png,JPG,gif',
		]);

		$comm = new Comments();
		$comm->text = $request->get('description');
		$comm->updated_at = Carbon::now();

		$slika = $request->file('profilePicture');

        $tmp_putanja = $slika->getPathName(); // tmp putanja
        $ekstenzija = $slika->getClientOriginalExtension(); // vraca: jpg, png - bez .
        $ime_fajla = time().'.'.$ekstenzija;
        $putanja = 'images/'.$ime_fajla;

        $putanja_server = public_path($putanja);
        try 
        {
            File::move($tmp_putanja, $putanja_server);

            $comm->comment_id = $id;
            $comm->updateComment();

            $pictures = new Pictures();
            $pictures->path = $putanja;
            $pictures->comment_id = $id;
            $idP = $pictures->savePicture();

            return redirect()->back()->with("success", "Comment successfully updated!");
        } 
        catch(\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
	}

}
