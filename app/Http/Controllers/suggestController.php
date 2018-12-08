<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\GetHelper;
use Carbon;

class suggestController extends Controller
{
    public function suggestion(Request $request)
    {
        $name = $request->name;
        return view('backend/suggestion', compact('name'));
    }

    public function newsuggestion(Request $request)
    {
        $date = Carbon\Carbon::now();
        $num = $request->num;
        $suggest = $request->suggest;
        $email = $request->email;

        if (substr($num, 0, 1) == 'A') {
            DB::table('pestsuggestion')->insert([
                'msgDate' => $date,
                'pestNum' => $num,
                'suggestion' => $suggest,
                'email' => $email,
            ]);
            // return redirect('pestDetailed/' . $num);
            return 'success';

        } else {
            DB::table('plantsuggestion')->insert([
                'msgDate' => $date,
                'plantNum' => $num,
                'suggestion' => $suggest,
                'email' => $email,
            ]);
            // return redirect('plantDetailed/' . $num);
            return 'success';

        }

    }
}
