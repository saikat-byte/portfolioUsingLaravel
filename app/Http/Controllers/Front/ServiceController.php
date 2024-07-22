<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\PageItem;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('item_order','asc')->paginate(9);
        $page_data = PageItem::where('id',1)->first();
        return view('front.services', compact('services','page_data'));
    }

    public function detail($slug)
    {
        $services = Service::orderBy('item_order','asc')->get();
        $service_detail = Service::where('slug',$slug)->first();
        return view('front.service_detail', compact('service_detail','services'));
    }
}
