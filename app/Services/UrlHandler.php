<?php

namespace App\Services;

use App\Url;

class UrlHandler 
{
    public function addUrl($sourceUrl, $expiresData) {
        //test
        $currDate = strtotime(date("Y-m-d H:i:s"));
        $expiresDate = "";
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $middlewareUrl = $url . bin2hex(random_bytes(10));
        switch ($expiresData) {
            case 1:
                $expiresDate = date('Y-m-d H:i:s', ($currDate + 3600));
            break;
            case 2:
                $expiresDate = date('Y-m-d H:i:s', ($currDate + 86400));
            break;
            case 3:
                $expiresDate = date('Y-m-d H:i:s', ($currDate + 604800));
            break;
            case 4:
                $expiresDate = date('Y-m-d H:i:s', ($currDate + 2592000));
            break;
            case 5:
                $expiresDate = date('Y-m-d H:i:s', ($currDate + 31536000));
            break;
        }
        $url = Url::create(['sourceUrl' => $sourceUrl, 'middlewareUrl' => $middlewareUrl, 'expiresData' => $expiresDate]);
        return $middlewareUrl;
    }

    public static function isExististingUrl($siteUrl) {
        $urls = Url::all();
        $sourceUrl = "";
        foreach ($urls as $url) {
            if ($siteUrl == $url->middlewareUrl) {
                $sourceUrl = $url->sourceUrl;
                break;
            }
        }
        return $sourceUrl;
    }


    public static function deleteExpiredUrls() {
        $urls = Url::all();
        $date = strtotime(date("Y-m-d H:i:s"));
        foreach ($urls as $url) {
            $tempdate = strtotime($url->expiresData);
            if ($date > $tempdate) {
                $url->delete();
            }
        }
    }
}