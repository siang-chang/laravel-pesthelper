<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\GetHelper;
use Carbon;

class testController extends Controller
{
    public function index()
    {
        return view('site/test');
    }

    public function testajax(Request $request)
    {
        //ajax
        $psd = $request->psd;
        if ($psd == 1234) {
            // dd($psd);
            return 'success';
        } else {
            // dd($psd);
            return 'error';
        }
    }
}
