<?php

namespace App\Http\Controllers\Admin;

use App\Models\Answers;
use App\Models\Questions;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use Carbon\Carbon;

class AnswersController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.answers',"Blog answers management", "Manage your webiste's blog answers", "answers.create", "answers.index");
        $this->model = new Answers();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['answers'] = $this->model->getAnswers();
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
        $questions = new Questions();
        $this->data['questions'] = $questions->getAll();
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
        $this->model->answer_id = $id;
        $this->data['answer'] = $this->model->selectOne();
        $questions = new Questions();
        $this->data['questions'] = $questions->getAll();
        return view($this->getView(), $this->data);
    }

    public function store(Request $request)
    {
        $rules = [
          'name' => 'required',
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {

            $this->model->answer = $request->get('name');
            $this->model->question_id = $request->get('question');
            $this->model->numberof = 0;

            $this->model->insert();
            return redirect(route('crud_route', ['controller'=> 'answers', 'action'=>'index']))->with("success", "Answer successfully added!");
        } catch(QueryException $e) {
            \Log::error("Greska pri unosu answer-a " . $e->getMessage());
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
        ];

        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();


        $this->model->answer = $request->get('name');
        $this->model->question_id = $request->get('question');
        $this->model->numberof = 0;

        try {
                $this->model->answer_id = $id;
                $this->model->updateQ();


            return redirect(route('crud_route', ['controller'=> 'answers', 'action'=>'index']))->with("success", "Answer successfully edited!");
        } 
        catch (QueryException $e) {
            \Log::error("Greska pri update-u odgovora: " . $e->getMessage());
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
              $this->model->answer_id = $id;
            $this->model->deleteA();
            return redirect()->back()->with("success", "Answer successfully deleted!");
        } catch (\Exception $e)
        {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An error occurred, please try again later");
        }
    }
}
