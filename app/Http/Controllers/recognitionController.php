<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\GetHelper;
use Carbon;

class RecognitionController extends Controller
{

    // /* 影像辨識模組測試區塊 */
    // public function imageUpload()
    // {
    //     return view('imageUpload');
    // }

    // public function imageUploadPost()
    // {
    //     request()->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);
    //     $imageName = time() . '.' . request()->image->getClientOriginalExtension();
    //     request()->image->move(public_path('pestimg'), $imageName);
    //     return back()
    //         ->with('image', $imageName);
    // }




}
