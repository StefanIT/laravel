<?php

namespace App\Http\Controllers\Admin;

use App\Models\Posts;
use App\Models\Themes;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use Carbon\Carbon;

class PostController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.posts',"Blog posts management", "Manage your webiste's blog posts", "posts.create", "posts.index");
        $this->model = new Posts();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['posts'] = $this->model->getAll();
        return view($this->getView(), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['form'] = "insert";
        return view($this->getView(), $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['form'] = 'edit';
        $this->model->post_id = $id;
        $this->data['post'] = $this->model->selectOne();
        $themes = new Themes();
        $this->data['themes'] = $themes->getThemes();
        return view($this->getView(), $this->data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'closed' => 'min:0|max:1',
            'description' => 'required|max:100|min:10'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();
        $this->model->post = $request->get('title');
        $this->model->closed = $request->get('closed');
        $this->model->description = $request->get("description");
        $this->model->theme_id = $request->get("parent");
        $this->model->updated_at = Carbon::now();
        $this->model->user_id = $request->session()->get('user')[0]->id;
        try {
                $this->model->post_id = $id;
                $this->model->updatePost();


            return redirect(route('crud_route', ['controller'=> 'post', 'action'=>'index']))->with("success", "Post successfully edited!");
        } 
        catch (QueryException $e) {
            \Log::error("Greska pri update-u objave: " . $e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }



    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
              $this->model->post_id = $id;
            $this->model->delete();
            return redirect()->back()->with("success", "Post successfully deleted!");
        } catch (\Exception $e)
        {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
    }
}
