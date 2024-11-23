<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;

class QuizController extends Controller
{
    public function index()
    {
        $questions = Question::with('answers')->paginate(10);
        return view('quiz.index', compact('questions'));
    }

    public function create()
    {
        return view('quiz.create');
    }


    public function store(QuestionRequest $request)
    {
        $validated = $request->validated();

        $question = Question::create(['title' => $validated['title']]);

        foreach ($validated['answers'] as $answerData) {
            if ($answerData['answer_text']) {
                $question->answers()->create($answerData);
            }
        }

        return redirect()->route('quiz.index')->with('success', 'Question et réponses créées avec succès.');
    }

    public function show(Question $question)
    {
        $question->load('answers');
        return view('quiz.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $question->load('answers');
        return view('quiz.edit', compact('question'));
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $validated = $request->validated();

        $question->update(['title' => $validated['title']]);

        foreach ($validated['answers'] as $answerData) {
            if (isset($answerData['id']) && $answerData['answer_text']) {
                $question->answers()->where('id', $answerData['id'])->update($answerData);
            } elseif ($answerData['answer_text']) {
                $question->answers()->create($answerData);
            } elseif (isset($answerData['id'])) {
                $question->answers()->where('id', $answerData['id'])->delete();
            }
        }

        return redirect()->route('quiz.index')->with('success', 'Question mise à jour avec succès.');
    }

    public function destroy(Question $question)
    {
        foreach ($question->answers as $answer) {
            $answer->delete();
        }
        $question->delete();

        return redirect()->route('quiz.index')->with('success', 'Question et ses réponses supprimées avec succès.');
    }
}
