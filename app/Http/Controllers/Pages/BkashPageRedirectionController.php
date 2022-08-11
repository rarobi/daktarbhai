<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class BkashPageRedirectionController extends Controller
{
    //
    public function index()
    {
        return redirect('https://daktarbhai.page.link/brac');
    }

    public function undp()
    {
        return redirect('https://daktarbhai.page.link/undp');
    }

    public function banglalink()
    {
        return redirect('https://daktarbhai.page.link/Banglalink');
    }

    public function marchantLogo(){

        $image = public_path('assets/img/bkash/Healthcare Information System Limited.png');

        $file = File::get($image);
        $type = File::mimeType($image);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;


//        $imageData = base64_encode(file_get_contents($image));
//        $imageData = (file_get_contents($image));
//        echo '<img src="data:image/png;base64,'.$imageData.'">';
//        return $imageData;

    }
}
