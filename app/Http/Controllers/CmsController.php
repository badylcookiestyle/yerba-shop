<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
class CmsController extends Controller
{
    public function deleteImage($fileName){
        $oldPath = public_path('images/layout/'.$fileName.'.jpg');
        File::delete($oldPath);
    }
    public function editMain(Request $request){
        $jsonString = file_get_contents(public_path('jsons/main.json'));
        $data = json_decode($jsonString, true);
        $data['data']['title'] = $request->title;
        $data['data']['description'] = $request->description;
        $newJsonString = json_encode($data);
        file_put_contents(public_path('jsons/main.json'), $newJsonString);
        if ($request->file('file')) {
            $this->deleteImage('yerba-welcome');
            $imagePath = $request->file('file');
            $imagePath->move(public_path('\images\layout'), 'yerba-welcome.'.$imagePath->getClientOriginalExtension());
        }

        return response()->json(['success' => $request]);
    }
    public function editShop(Request $request){
        if ($request->file('file')) {

            $jsonString = file_get_contents(public_path('jsons/title.json'));
            $data = json_decode($jsonString, true);
            $data['data']['title'] = $request->title;
            $newJsonString = json_encode($data);
            file_put_contents(public_path('jsons/title.json'), $newJsonString);
            $this->deleteImage('yerba-header');
            $imagePath = $request->file('file');
            $imagePath->move(public_path('\images\layout'), 'yerba-header.'.$imagePath->getClientOriginalExtension());
        }

    }
    public function editAbout(Request $request){
        $jsonString = file_get_contents(public_path('jsons/about.json'));
        $data = json_decode($jsonString, true);
        $data['data']['title'] = $request->title;
        $data['data']['description'] = $request->description;
        $newJsonString = json_encode($data);
        file_put_contents(public_path('jsons/about.json'), $newJsonString);

        if ($request->file('file')) {
            $this->deleteImage('yerba-about');
            $imagePath = $request->file('file');
            $imagePath->move(public_path('\images\layout'), 'yerba-about.'.$imagePath->getClientOriginalExtension());
        }
    }
}
