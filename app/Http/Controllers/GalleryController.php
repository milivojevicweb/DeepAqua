<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function page(){

        try{
            $model= new Gallery();
            $gallery=$model->getGallery();
            $this->data["gallery"]=$gallery;
            return view('front.pages.gallery',$this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }
}
