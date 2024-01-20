<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\IdRequest;
use App\Http\Requests\insertInGalleryRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\File;

class GalleryController extends AdminController
{

    public function getGallery(){
        try{
            $model=new Gallery();
            $gallery=$model->getGallery();
            $this->data["gallery"]=$gallery;
        return view("admin.pages.gallery.table",$this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function galleryForm(){
        return view('admin.pages.gallery.insert',$this->data);
    }

    public function insertInGallery(insertInGalleryRequest $request){
        if($request->has("insertGallery")){

            $model= new Gallery();
            $image=$request->file("image");
            $name=$request->input("name");

            $imeFajla= time().$image->getClientOriginalName();

            if($image->isValid()){
                $image->move(public_path()."/images/",$imeFajla);

                try{
                    $insertGallery=$model->insertInGallery($imeFajla,$name);
                    return redirect()->back()->with("message", "Uspešno uneta slika!");
                }catch(QueryException  $ex){
                    return redirect()->back()->with("message", "Greška!");
                    \Log::error($ex->getMessage());
                }
            }else{
                return redirect()->back()->with("message","Fajl nije validan!");
            }
        }
    }

    public function deleteGallery(IdRequest $request){
        $id=$request->input("id");
        if(isset($id)){
            try{
                $model=new Gallery();
                $delete=$model->deleteGallery($id);
                $imgName=$model->getImageSrc($id);
                $imgPath=public_path()."/images/".$imgName;
                if(file_exists($imgPath)){
                    File::delete(public_path("images/filename.png"));

                }

            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška');
                \Log::error($ex->getMessage());
            }
        }
    }

    public function getGalleryJson(){
        try{
            $model=new Gallery();
            $gallery=$model->getGallery();
            return response()->json($gallery);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }
}
