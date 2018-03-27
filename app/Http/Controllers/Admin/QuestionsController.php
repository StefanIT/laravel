<?php

namespace App\Http\Controllers\Admin;

use App\Models\Questions;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use Carbon\Carbon;

class QuestionsController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.questions',"Blog questions management", "Manage your webiste's blog questions", "questions.create", "questions.index");
        $this->model = new Questions();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['questions'] = $this->model->getAll();
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
        $this->model->question_id = $id;
        $this->data['question'] = $this->model->selectOne();
        return view($this->getView(), $this->data);
    }

    public function store(Request $request)
    {
        $rules = [
          'name' => 'required',
          'activate' => 'required|min:0|max:1'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {

            $this->model->question = $request->get('name');
            $this->model->activate = $request->get('activate');

            $this->model->insert();
            return redirect(route('crud_route', ['controller'=> 'questions', 'action'=>'index']))->with("success", "Question successfully added!");
        } catch(QueryException $e) {
            \Log::error("Greska pri unosu question-a " . $e->getMessage());
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
          'name' => 'required',
          'activate' => 'required|min:0|max:1'
        ];

        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();


        $this->model->question = $request->get('name');
        $this->model->activate = $request->get('activate');

        try {
                $this->model->question_id = $id;
                $this->model->updateQ();


            return redirect(route('crud_route', ['controller'=> 'questions', 'action'=>'index']))->with("success", "Question successfully edited!");
        } 
        catch (QueryException $e) {
            \Log::error("Greska pri update-u pitanja: " . $e->getMessage());
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
              $this->model->question_id = $id;
            $this->model->delete();
            return redirect()->back()->with("success", "Question successfully deleted!");
        } catch (\Exception $e)
        {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
    }
}
