<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
class CmsController extends Controller
{
    public function editMain(Request $request){

        if ($request->file('file')) {
            //--- deleting old img

            $oldPath = public_path('images/layout/yerba-welcome.jpg');
            File::delete($oldPath);
            //--- adding new img
            $imagePath = $request->file('file');

            $imagePath->move(public_path('\images\layout'), 'yerba-welcome.'.$imagePath->getClientOriginalExtension());


        }

        return response()->json(['success' => $request]);
    }
    public function editShop(Request $request){
        if ($request->file('file')) {
            //--- deleting old img

             $oldPath = public_path('images/layout/yerba-header.jpg');
            File::delete($oldPath);
            //--- adding new img
            $imagePath = $request->file('file');

            $imagePath->move(public_path('\images\layout'), 'yerba-header.'.$imagePath->getClientOriginalExtension());


        }
    }
    public function editAbout(Request $request){
        if ($request->file('file')) {
            //--- deleting old img

             $oldPath = public_path('images/layout/yerba-about.jpg');
            File::delete($oldPath);
            //--- adding new img
            $imagePath = $request->file('file');

            $imagePath->move(public_path('\images\layout'), 'yerba-about.'.$imagePath->getClientOriginalExtension());


        }
    }
}
