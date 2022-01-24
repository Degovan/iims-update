<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class HomePageController extends Controller
{
    public function index()
    {
        $homepage = HomePage::first();

        $data   = [
            'homepage'  => $homepage
        ];

        return view('welcome', $data);
    }

    public function edit()
    {
        $homepage = HomePage::first();

        $data   = [
            'data'  => $homepage
        ];

        return view('editHomepage', $data);
    }

    public function update(Request $request)
    {
        $background = $request->file('background');
        $content    = $request->content;
        $copyright  = $request->copyright;
        $footer     = $request->footer;
        $greeting   = $request->greeting;
        $logo       = $request->file('logo');

        if($background) {
            $validator = Validator::make($request->all(), [
                'background' => 'file|image|mimes:png|max:2048',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator->errors()->all());
            } else {
                $file_lama = public_path() . '/assets/images/background-login.png';
                unlink($file_lama);
                $tujuan_upload = public_path() . '/assets/images';
                $background->move($tujuan_upload, 'background-login.png');
            }
        }

        if($logo) {
            $validator = Validator::make($request->all(), [
                'logo' => 'file|image|mimes:png|max:2048',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator->errors()->all());
            } else {
                $file_lama = public_path() . '/assets/images/logo.png';
                unlink($file_lama);
                $tujuan_upload = public_path() . '/assets/images';
                $background->move($tujuan_upload, 'logo.png');
            }
        }

        $data   = [
            'content'       => $content,
            'copyright'     => $copyright,
            'footer'        => $footer,
            'greeting'      => $greeting,
        ];

        HomePage::where('id', 1)
            ->update($data);

        return Redirect::back();
    }
}
