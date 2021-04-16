<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Lead;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ResponseController extends Controller
{
    public function store(Request $request)
    {
        $nameData = array_filter(array_values($request->data), function ($v, $k) {
            $output = $v;
            if (is_array($output))
                $output = implode(',', $output);

//            $this->consoleLog(array_values($v));
            $thing = array_values($v)[2] ?? "";
            return $thing == 'Name';
        }, ARRAY_FILTER_USE_BOTH);

        $emailData = array_filter(array_values($request->data), function ($v, $k) {
            $output = $v;
            if (is_array($output))
                $output = implode(',', $output);

//            $this->consoleLog(array_values($v));
            $thing = array_values($v)[2] ?? "";
            return $thing == 'Email';
        }, ARRAY_FILTER_USE_BOTH);

        $phoneData = array_filter(array_values($request->data), function ($v, $k) {
            $output = $v;
            if (is_array($output))
                $output = implode(',', $output);

//            $this->consoleLog(array_values($v));
            $thing = array_values($v)[2] ?? "";
            return $thing == 'Phone Number';
        }, ARRAY_FILTER_USE_BOTH);

//        $nameData = $nameData[count($request->data) - 1]['answer'];
//        $emailData = $emailData[count($request->data) - 1]['answer'];
//        $phoneData = $phoneData[count($request->data) - 1]['answer'];

//        $this->consoleLog($nameData);
//        $this->consoleLog($emailData);
//        $this->consoleLog($phoneData);

        $lead = Lead::create([
            'user_id' => Auth::user()->id,
            'first' => "No Name",
            'last' => "",
            'form_filled' => $request->data[0]['form_id'],
        ]);

        if (!empty($nameData)) {
            $nameData = str_replace("\"", "", str_replace("'", "\'", json_encode(array_values($nameData)[0]['answer'])));
            $lead->first = $nameData;
            $lead->save();
        }
        if (!empty($emailData)) {
            $emailData = str_replace("\"", "", str_replace("'", "\'", json_encode(array_values($emailData)[0]['answer'])));
            $lead->email = $emailData;
            $lead->save();
        }
        if (!empty($phoneData)) {
            $phoneData = str_replace("\"", "", str_replace("'", "\'", json_encode(array_values($phoneData)[0]['answer'])));
            $lead->phonenum = $phoneData;
            $lead->save();
        }

        foreach ($request->data as $key=>$value) {
            if ($key !== 0) {

                $question = $value['question'] ?? "";

                $answer = $value['answer'] ?? "";

                Response::create([
                    'lead_id' => $lead->id,
                    'question' => $question,
                    'response' => $answer,
                    'index' => $key,
                ]);
            }
        }


        return Redirect::route('dashboard');
    }

    function consoleLog($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('" . $output . "' );</script>";
    }
}
