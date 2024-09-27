<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadmin|dosen']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil data category dengan relation
        $category = Category::with(['question'=>function($q){
            $q->with('answers');
        }])->findOrFail($_GET['id']);
        return view('backend.pages.question.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //jika sudah mempunyai question akan diupdate, dan kalau belum di buat
        if ($request->input('qid')) {
            $data_question = [
                'question' => $request->input('question'),
                'category_id' => $request->input('id')
            ];
            $question = Question::find($request->input('qid'));
            $question->update($data_question);

            foreach($request->input('answer') as $key => $ans)
            {
                $answerUpdate = Answer::where('question_id', $request->input('qid'))->where('id',$key)->first();
                if ($answerUpdate) {
                    $answerUpdate->update([
                        'answer' => $ans
                    ]);
                }else{
                    $answerSave = Answer::insert([
                        'answer' => $ans,
                        'question_id' => $request->input('qid'),
                        'is_true' => 0
                    ]);
                }
            }

            // $truAnswer = Answer::where('question_id',$request->input('qid'))->first();
            // $question = Question::find($request->input('qid'));
            // $question->update([
            //     'answer' => $truAnswer->answer
            // ]);

        }else{
            $data_question = [
                'question' => $request->input('question'),
                'category_id' => $request->input('id')
            ];
            $question = Question::insertGetId($data_question);
            foreach($request->input('answer') as $ans)
            {
                $answer = Answer::insert([
                    'answer' => $ans,
                    'question_id' => $question,
                    'is_true' => 0
                ]);
            }
        }
        toast('Qestion has been updated', 'success');
                return redirect()->back();
        

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete question dan answer
        $question = Question::find($id);

        $question->destroy($id);
        $question->answers()->delete();
        toast('Qestion has been updated', 'success');
        return redirect()->back();
    }

    public function questionDelete($id)
    {
        //delete answer
        $answer = Answer::destroy($id);
        toast('Qestion has been updated', 'success');
        return redirect()->back();
    }

    public function questionCheck($id)
    {

        //memberikan nilai true dan false ke answer (defultnya false)
        $answer = Answer::find($id);

        if ($answer->is_true) {
            $answer->update(['is_true'=>0]);
        }else{
            $answer->update(['is_true'=>1]);
        }
        toast('Qestion has been updated', 'success');
        return redirect()->back();
    }
}
