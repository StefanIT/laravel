<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Themes;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use Carbon\Carbon;

class ThemesController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.themes',"Blog themes management", "Manage your webiste's blog themes", "themes.create", "themes.index");
        $this->model = new Themes();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['themes'] = $this->model->getThemes();
        return view($this->getView(), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['form'] = 'insert';
        $this->data['categories'] = Categories::get();
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
        $this->model->theme_id = $id;
        $this->data['theme'] = $this->model->selectOne();
        $this->data['categories'] = Categories::all();
        return view($this->getView(), $this->data);
    }

    public function store(Request $request)
    {
        $rules = [
          'title' => 'required',
          'description' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();
        try {
            $this->model->theme = $request->get('title');
            $this->model->description = $request->get('description');
            $this->model->category_id = $request->get("parent");
            $this->model->insert();


            return redirect(route('crud_route', ['controller'=> 'themes', 'action'=>'index']))->with("success", "Theme successfully added!");
        } catch(QueryException $e) {
            \Log::error("Greska pri unosu teme " . $e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
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
          'description' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();


        $this->model->theme = $request->get('title');
        $this->model->description = $request->get('description');
        $this->model->category_id = $request->get("parent");
        $this->model->question_id = 1;

        try {
                $this->model->theme_id = $id;
                $this->model->update();


            return redirect(route('crud_route', ['controller'=> 'themes', 'action'=>'index']))->with("success", "Theme successfully edited!");
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
              $this->model->theme_id = $id;
            $this->model->delete();
            return redirect()->back()->with("success", "Theme successfully deleted!");
        } catch (\Exception $e)
        {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
    }
}
