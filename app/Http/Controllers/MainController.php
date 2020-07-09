<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UrlHandler;
use Illuminate\Http\RedirectResponse;

class MainController extends Controller
{
    public function main() {
        return view('mainPage');
        //test
        //test
    }

    public function handelUrl(Request $request) {
        $shortUrl = (new UrlHandler())->addUrl($request->input('sourceUrl'), $request->input('expiresDate'));
        return response()->json($shortUrl, 200);
    }

    public function redirect() {
        $host = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['REQUEST_URI'];
        $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
        $full_url = $protocol . "://" . $host . $path;  
        
        $sourceUrl = UrlHandler::isExististingUrl($full_url);

        if (!empty($sourceUrl)) {
            return redirect()->away($sourceUrl);
        }else {
            return redirect('/');
        }
    }
}
