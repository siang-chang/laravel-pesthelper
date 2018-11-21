<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\GetHelper;

class suggestController extends Controller
{
        //害蟲修改建議
    public function suggestion(Request $request)
    {
        $num = $request->num;
        return view('suggestion', compact('num'));
    }

    public function newsuggestion(Request $request)
    {
        $date = Carbon\Carbon::now();
        $num = $request->num;
        $suggest = $request->suggest;
        $email = $request->email;
        
        dd(substr($num,1));
        if (substr($num,1)  == 'A'){
        DB::table('pestsuggestion')->insert([
            'msgDate' => $date,
            'pestNum' => $num,
            'suggestion' => $suggest,
            'email' => $email,
        ]);
        return redirect('pestDetailed/' . $num);
    }
        else {
            DB::table('plantsuggestion')->insert([
                'msgDate' => $date,
                'plantNum' => $num,
                'suggestion' => $suggest,
                'email' => $email,
                ]);
                return redirect('plantDetailed/' . $num);
        }

    }
}
