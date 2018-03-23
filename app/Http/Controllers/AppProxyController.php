<?php

namespace App\Http\Controllers;

use App\Http\Helper\CurlHelper;

class AppProxyController extends Controller
{
    public function loadViewElement ()
    {
        $helperCurl = new CurlHelper();
        $country = "Malaysia";

        $lockers = $helperCurl->getLocker($country);
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
        $country = "Malaysia";
        $lockers = $helperCurl->getLocker($country);
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
