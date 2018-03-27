<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Questions extends Model
{
    //
	public $question_id;
	public $question;
	public $activate;
	public $user_id;
	public $answer_id;

    public function getQuestions()
    {
    	$result = DB::table('questions')
    				->join('answers','questions.question_id','answers.question_id')
    				->join('themes','answers.theme_id','themes.theme_id')
    				->where('activate',0)
    				->select('*','questions.question_id as q_id','themes.theme_id as thm_id')
    				->get();
    	return $result;
    }

    public function getAll()
    {
        $result = DB::table('questions')
                    ->get();
        return $result;
    }

    public function selectOne()
    {
        $result = DB::table('questions')
                    ->where('question_id',$this->question_id)
                    ->get()
                    ->first();
        return $result;
    }

    public function insert()
    {
    	$result = DB::table('questions')
    				->insertGetId([
    					'question' => $this->question,
    					'activate' => $this->activate
    				]);
    	return $result;
    }

    public function updateQ()
    {
        $result = DB::table('questions')
                    ->where('question_id',$this->question_id)
                    ->update([
                        'question' => $this->question,
                        'activate' => $this->activate
                    ]);
        return $result;
    }

    public function insertNumber()
    {
    	$result = DB::table('answers')
    				->where('answers.answer_id',$this->answer_id)
    				->increment(
    					'numberof',1
    				);
    	return $result;
    }

    public function insertUserVote()
    {
    	$result = DB::table('users_answers')
    				->insertGetId([
    					'user_id' => $this->user_id,
    					'answer_id' => $this->answer_id,
    					'question_id'=>$this->question_id
    				]);
    	return $result;
    }

    public function userVoted()
    {
        $result = DB::table('users_answers')
                    ->where([
                        ['user_id','=',$this->user_id],
                        ['question_id','=',$this->question_id]
                    ])
                    ->get()
                    ->first();

        return $result;
    }

    public function delete()
    {
        $result  = DB::table('questions')
                    ->where('question_id',$this->question_id)
                    ->delete();
        return $result;
    }
}
