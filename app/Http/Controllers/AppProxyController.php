<?php

namespace App\Http\Controllers;

use App\Http\Helper\CurlHelper;
use Illuminate\Http\Request;

class AppProxyController extends Controller
{
//    public function index (Request $request)
//    {
//        $helperCurl = new CurlHelper();
//        $helperCurl->creteScriptTag();
//        $shop = '';
//        return response()->view('cart',compact('shop'))->withHeaders(['Content-Type' => 'application/liquid']);
//    }

    public function loadViewElement ()
    {
        $helperCurl = new CurlHelper();
        $lockers = $helperCurl->getLocker();
        $lockers = json_decode($lockers)->data;
        $cities = [];
        foreach ($lockers as $locker) {
            if(!in_array($locker->city,$cities)){
                $cities[] = $locker->city;
            }
        }

        return view('mapsLocation',compact('lockers','cities'));
    }

    public function filterCity ($filter)
    {
        $helperCurl = new CurlHelper();
        $lockers = $helperCurl->getLocker();
        $lockers = json_decode($lockers)->data;
        if (!empty($filter)) {
            $filterLockers = [];
            foreach ($lockers as $locker) {
                if ($locker->city == $filter) {
                    $filterLockers[] = $locker;
                }
            }
        }else{
            $filterLockers = $lockers;
        }
        return json_encode($filterLockers);
    }
}
