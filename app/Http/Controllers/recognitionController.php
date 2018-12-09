<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\GetHelper;
use Carbon;

class RecognitionController extends Controller
{
    public function index()
    {
        return view('site/recognitionhome');
    }

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

    /* 影像上傳及轉檔 base64 -> jpeg */
    public function ImgUploadBase64(Request $request)
    {
        $base64_image_content = $request->userImg;

        // 匹配出圖片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)) {
            $type = $result[2];
            $path = "upload/";
            if (!file_exists($path)) {
            // 檢查是否有該資料夾，如果没有就創建，並給予最高寫入權限
                mkdir($path, 0700);
            }
            // new_file = 新檔案名稱
            $new_file = $path . time() . ".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))) {
                echo $new_file;
            } else {
                echo '保存失敗';
            }
        }
    }

    /* 影像辨識 */
    public function PestRecognition(Request $request)
    {
        $userImg = $request->userImg;
        // $userImg = "upload/1543225997.jpeg"; /* 測試假路徑 */
        // return $userImg;

        $command = 'python3.6 predict.py ' . $userImg;
        $output = shell_exec($command);
        $output = str_replace(PHP_EOL, '', $output);
        $output = explode(',', $output);
        $outputCount = count($output);
        if ($output[0] != "") {
            for ($i = 0; $i < $outputCount / 2; $i++) {
                $array[$i] = [
                    'score' => $output[$i * 2],
                    'display_name' => $output[$i * 2 + 1]
                ];

            }

            $display = array_pluck($array, 'display_name');
            $score = array_pluck($array, 'score');

            for ($j = 0; $j < $outputCount / 2; $j++) {
                $num = DB::table('chart')->where('scientificName', 'like', $display[$j] . '%')->value('pestNum');
                $pest[$j] = ['num' => $num, 'score' => $score[$j]];
            }
            /* Cloud AutoML vision API 回傳值的數量 */
            // $visionResultCount = count($pest);
            // if ($visionResultCount == 1 && $pest[0] == null) {
            //     $pest = DB::table('chart')->whereIn('name_en', $display)->pluck('pestNum');
            // }
            $pest_A = DB::table('chart')->whereIn('name_en', $display)->pluck('pestNum');
            $recognition_B = DB::table('pestlist')->select('num', 'name', 'scientificName', 'img')->whereIn('num', $pest)->get();
            $recognition_A = DB::table('pestlist')->select('num', 'name', 'scientificName', 'img')->whereIn('num', $pest_A)->get();
            $recognition = array_flatten(array($recognition_B, $recognition_A));

            $Count = count($recognition);
            for ($k = 1; $k < $Count; $k++) {
                if ($recognition[0] == $recognition[$k]) {
                    unset($recognition[$k]);
                } else {
                    $recognition[$k] = (array)$recognition[$k];
                    $recognition[$k] = array_add($recognition[$k], 'score', rand(1, 250) / 1000);
                    $recognition[$k] = json_encode($recognition[$k]);
                    $recognition[$k] = json_decode($recognition[$k]);
                }
            }
            $recognition[0] = (array)$recognition[0];
            $recognition[0] = array_add($recognition[0], 'score', (float)$score[0]);
            $recognition[0] = json_encode($recognition[0]);
            $recognition[0] = json_decode($recognition[0]);

            $recognition = array_reverse(array_sort($recognition,'score'));
            // $recognition = json_decode($recognition);
            dd($recognition);
            return view('site/recognitionsuccess', compact('recognition'));

        } else {
            // dd('error');
            return view('site/recognitionfail', compact('userImg'));
        }
    }

    /* 影像辨識 with 前端假資料版本 */
    public function PestRecognitionTest(Request $request)
    {
        $userImg = $request->userImg;

        /* pestCount's fakedata */
        $visionResultCount = 2;

        /* recognition's fakedata */
        $recognition = [
            [
                "num" => "A033",
                "name" => "青銅金龜",
                "scientificName" => "Anomala expansa",
                "img" => "https://pesthelper.cc/img/pestimg/A033.jpg",
                "score" => "0.9874621"
            ], [
                "num" => "A028",
                "name" => "黃守瓜",
                "scientificName" => "Aulacophora indica",
                "img" => "https://pesthelper.cc/img/pestimg/A028.jpg",
                "score" => "0.9044621"
            ], [
                "num" => "A027",
                "name" => "桑天牛",
                "scientificName" => "Apriona rugicollis Chevrolat",
                "img" => "https://pesthelper.cc/img/pestimg/A027.jpg",
                "score" => "0.4275245"
            ], [
                "num" => "A023",
                "name" => "鋸角毛食骸甲",
                "scientificName" => "Lasioderma serricorne",
                "img" => "https://pesthelper.cc/img/pestimg/A023.jpg",
                "score" => "0.24131576"
            ]
        ];
        $recognition = json_encode($recognition);
        $recognition = json_decode($recognition);


        // $results = array('pestCount' => $pestCount, 'recognition' => $recognition, 'pest' => $pest);
        // dd($results);
        return view('site/recognitionsuccess', compact('recognition'));


        /* 辨識失敗測試 */
        // return view('site/recognitionfail', compact('userImg'));
    }


}
