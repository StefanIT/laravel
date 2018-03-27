<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answers extends Model
{
    //
	public $question_id;
	public $answer;
	public $numberof;
	public $theme_id;
    public $answer_id;

    public function getAnswers()
    {
    	$result = DB::table('answers')
                    ->leftJoin('questions','answers.question_id','questions.question_id')
                    ->leftJoin('themes','answers.theme_id','themes.theme_id')
    				->get();
    	return $result;
    }

    public function selectOne()
    {
        $result = DB::table('answers')
                    ->join('questions','answers.question_id','questions.question_id')
                    ->where('answer_id',$this->answer_id)
                    ->get()
                    ->first();
        return $result;
    }

    public function insert()
    {
    	$result = DB::table('answers')
    				->insertGetId([
    					'answer' => $this->answer,
    					'question_id' => $this->question_id,
                        'numberof' => $this->numberof,
                        'theme_id' => $this->theme_id
    				]);
    	return $result;
    }

    public function updateQ()
    {
        $result = DB::table('answers')
                    ->where('answer_id',$this->answer_id)
                    ->update([
                        'answer' => $this->answer,
                        'question_id' => $this->question_id,
                        'numberof' => $this->numberof,
                        'theme_id' => $this->theme_id
                    ]);
        return $result;
    }

    public function brojGlasova()
    {
        $result = DB::table('answers')
                    ->count(DB::raw('numberof'));
        return $result;
    }

    public function deleteA()
    {
        $result  = DB::table('answers')
                    ->where('answer_id',$this->answer_id)
                    ->delete();
        return $result;
    }
}
