<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageItem;

class AdminHomePageController extends Controller
{
    public function banner()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_banner_show', compact('page_data'));
    }

    public function banner_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $request->validate([
            'banner_person_name' => 'required'
        ]);

        if($request->hasFile('banner_photo')) {
            $request->validate([
                'banner_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$page_data->banner_photo));

            $ext = $request->file('banner_photo')->extension();
            $final_name = 'home_banner'.'.'.$ext;

            $request->file('banner_photo')->move(public_path('uploads/'),$final_name);

            $page_data->banner_photo = $final_name;
        }

        $page_data->banner_title = $request->banner_title;
        $page_data->banner_person_name = $request->banner_person_name;
        $page_data->banner_person_designation = $request->banner_person_designation;
        $page_data->banner_description = $request->banner_description;
        $page_data->banner_button_text = $request->banner_button_text;
        $page_data->banner_button_url = $request->banner_button_url;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }


    public function about()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_about_show', compact('page_data'));
    }

    public function about_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $request->validate([
            'about_title' => 'required'
        ]);

        if($request->hasFile('about_photo')) {
            $request->validate([
                'about_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$page_data->about_photo));

            $ext = $request->file('about_photo')->extension();
            $final_name = 'home_about'.'.'.$ext;

            $request->file('about_photo')->move(public_path('uploads/'),$final_name);

            $page_data->about_photo = $final_name;
        }

        $page_data->about_subtitle = $request->about_subtitle;
        $page_data->about_title = $request->about_title;
        $page_data->about_description = $request->about_description;
        $page_data->about_person_name = $request->about_person_name;
        $page_data->about_person_phone = $request->about_person_phone;
        $page_data->about_person_email = $request->about_person_email;
        $page_data->about_icon1 = $request->about_icon1;
        $page_data->about_icon1_url = $request->about_icon1_url;
        $page_data->about_icon2 = $request->about_icon2;
        $page_data->about_icon2_url = $request->about_icon2_url;
        $page_data->about_icon3 = $request->about_icon3;
        $page_data->about_icon3_url = $request->about_icon3_url;
        $page_data->about_icon4 = $request->about_icon4;
        $page_data->about_icon4_url = $request->about_icon4_url;
        $page_data->about_icon5 = $request->about_icon5;
        $page_data->about_icon5_url = $request->about_icon5_url;
        $page_data->about_status = $request->about_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }


    public function skill()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_skill_show', compact('page_data'));
    }

    public function skill_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $page_data->skill_subtitle = $request->skill_subtitle;
        $page_data->skill_title = $request->skill_title;
        $page_data->skill_status = $request->skill_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }


    public function qualification()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_qualification_show', compact('page_data'));
    }

    public function qualification_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $page_data->qualification_subtitle = $request->qualification_subtitle;
        $page_data->qualification_title = $request->qualification_title;
        $page_data->education_title = $request->education_title;
        $page_data->experience_title = $request->experience_title;
        $page_data->qualification_status = $request->qualification_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }



    public function counter()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_counter_show', compact('page_data'));
    }

    public function counter_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $request->validate([
            'counter1_number' => 'required',
            'counter1_name' => 'required',
            'counter2_number' => 'required',
            'counter2_name' => 'required',
            'counter3_number' => 'required',
            'counter3_name' => 'required',
            'counter4_number' => 'required',
            'counter4_name' => 'required'
        ]);

        if($request->hasFile('counter_background')) {
            $request->validate([
                'counter_background' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$page_data->counter_background));

            $ext = $request->file('counter_background')->extension();
            $final_name = 'counter_background'.'.'.$ext;

            $request->file('counter_background')->move(public_path('uploads/'),$final_name);

            $page_data->counter_background = $final_name;
        }

        $page_data->counter1_number = $request->counter1_number;
        $page_data->counter1_name = $request->counter1_name;
        $page_data->counter2_number = $request->counter2_number;
        $page_data->counter2_name = $request->counter2_name;
        $page_data->counter3_number = $request->counter3_number;
        $page_data->counter3_name = $request->counter3_name;
        $page_data->counter4_number = $request->counter4_number;
        $page_data->counter4_name = $request->counter4_name;
        $page_data->counter_status = $request->counter_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }



    public function testimonial()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_testimonial_show', compact('page_data'));
    }

    public function testimonial_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        if($request->hasFile('testimonial_background')) {
            $request->validate([
                'testimonial_background' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$page_data->testimonial_background));

            $ext = $request->file('testimonial_background')->extension();
            $final_name = 'testimonial_background'.'.'.$ext;

            $request->file('testimonial_background')->move(public_path('uploads/'),$final_name);

            $page_data->testimonial_background = $final_name;
        }

        $page_data->testimonial_subtitle = $request->testimonial_subtitle;
        $page_data->testimonial_title = $request->testimonial_title;
        $page_data->testimonial_status = $request->testimonial_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }


    public function client()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_client_show', compact('page_data'));
    }

    public function client_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $page_data->client_subtitle = $request->client_subtitle;
        $page_data->client_title = $request->client_title;
        $page_data->client_status = $request->client_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }

    public function service()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_service_show', compact('page_data'));
    }

    public function service_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $request->validate([
            'service_total' => 'required'
        ]);

        $page_data->service_subtitle = $request->service_subtitle;
        $page_data->service_title = $request->service_title;
        $page_data->service_total = $request->service_total;
        $page_data->service_status = $request->service_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }


    public function portfolio()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_portfolio_show', compact('page_data'));
    }

    public function portfolio_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $page_data->portfolio_subtitle = $request->portfolio_subtitle;
        $page_data->portfolio_title = $request->portfolio_title;
        $page_data->portfolio_status = $request->portfolio_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }


    public function blog()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_blog_show', compact('page_data'));
    }

    public function blog_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $page_data->blog_subtitle = $request->blog_subtitle;
        $page_data->blog_title = $request->blog_title;
        $page_data->blog_status = $request->blog_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }


    public function seo()
    {
        $page_data = HomePageItem::where('id',1)->first();
        return view('admin.home_seo_show', compact('page_data'));
    }

    public function seo_update(Request $request)
    {
        $page_data = HomePageItem::where('id',1)->first();

        $page_data->seo_title = $request->seo_title;
        $page_data->seo_meta_description = $request->seo_meta_description;
        $page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');

    }
}
