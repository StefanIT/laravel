<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use Carbon\Carbon;

class CategoriesController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.categories',"Blog categories management", "Manage your webiste's blog categories", "themes.create", "themes.index");
        $this->model = new Categories();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = $this->model->getAll();
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
        $this->model->category_id = $id;
        $this->data['category'] = $this->model->selectOne();
        return view($this->getView(), $this->data);
    }

    public function store(Request $request)
    {
        $rules = [
          'name' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {
            $this->model->category = $request->get('name');
            $this->model->insert();
            return redirect(route('crud_route', ['controller'=> 'categories', 'action'=>'index']))->with("success", "Category successfully added!");
        } catch(QueryException $e) {
            \Log::error("Greska pri unosu kategorije " . $e->getMessage());
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
          'name' => 'required'
        ];

        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();


        $this->model->category = $request->get('name');

        try {
                $this->model->category_id = $id;
                $this->model->updateCat();


            return redirect(route('crud_route', ['controller'=> 'categories', 'action'=>'index']))->with("success", "Theme successfully edited!");
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
              $this->model->category_id = $id;
            $this->model->delete();
            return redirect()->back()->with("success", "Category successfully deleted!");
        } catch (\Exception $e)
        {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
    }
}
