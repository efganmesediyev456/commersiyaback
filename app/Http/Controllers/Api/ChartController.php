<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Chart;
use App\Models\Atom\SimpleItem;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $chartjs = SimpleItem::where('type','energy-statistic')->active()->get() ;

        return  Chart::collection($chartjs) ;
    }
}
