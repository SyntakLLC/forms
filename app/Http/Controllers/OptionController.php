<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OptionController extends Controller
{
    function consoleLog($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('" . $output . "' );</script>";
    }

    public function destroy(Request $request)
    {
        $question = Question::find($request->get('question_id'));
        $options = $question->options;
        $deletedIndex = $options->search(function($option) use ($request) {
            return $option->uuid === $request->get('deletedUUID');
        });

        $deletedOption = Option::findByUuid($request->get('deletedUUID'));

        foreach($options as $option) {
            if ($option['index'] > $deletedOption['index']) {
                $option['index'] = $option['index'] - 1;
                $option->save();
            }
        }

        $deletedOption->delete();

        return Redirect::route('form.edit', $request->get('form_uuid'));
    }

    public function update(Request $request)
    {
        $option = Option::find($request->get('option_id'));

        $option->title = $request->get('title');

        $option->save();

        return Redirect::route('form.question.edit', [
            'form' => Form::find($request->get('form_id')),
            'question' => Question::find($request->get('question_id')),
        ]);
    }
}
