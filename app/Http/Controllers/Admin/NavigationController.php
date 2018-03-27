<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menus;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.navigation',"Navigation links management", "Manage your webiste's main navigation", "navigation.create", "navigation.index");
        $this->model = new Menus();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['navigations'] = $this->model->getAll();
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
        $this->data['navigations'] = $this->model->getAll();
        return view($this->getView(), $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'route' => 'required',
          'name' => 'required',
          'position' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {
            $this->model->opis = $request->get('position');
            $this->model->link = $request->get('route');
            $this->model->menu = $request->get("name");
            $this->model->parent_id = $request->get("parent");
            $this->model->saveMenu();
            return redirect(route('crud_route', ['controller'=> 'navigation', 'action'=>'index']))->with("success", "Navigation link successfully added!");
        } catch(QueryException $e) {
            \Log::error("Greska pri unosu navigacionog linka " . $e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['form'] = 'edit';
        $this->model->id = $id;
        $this->data['navigation'] = $this->model->find();
        $this->data['navigations'] = $this->model->getAll();
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
            'route' => 'required',
            'name' => 'required',
            'opis' => 'required'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {
            $this->model->opis = $request->get('opis');
            $this->model->link = $request->get('route');
            $this->model->menu = $request->get("name");
            $this->model->parent_id = $request->get('parent');
            $this->model->id = $id;
            $this->model->updateMenu();

            return redirect(route('crud_route', ['controller'=> 'navigation', 'action'=>'index']))->with("success", "Navigation link successfully updated!");
        } catch(QueryException $e) {
            \Log::error("Greska pri unosu izmeni linka " . $e->getMessage());
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
            $this->model->id = $id;
            $this->model->delete();
            return redirect(route('crud_route', ['controller'=> 'navigation', 'action'=>'index']))->with("success", "Navigation link successfully deleted!");
        } catch (QueryException $e) {
            \Log::error("Greska pri brisanju navigacionog linka: " . $e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
    }
}
