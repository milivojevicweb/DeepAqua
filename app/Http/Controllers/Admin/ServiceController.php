<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\IdRequest;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Image;
use App\Models\Service;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ServiceController extends AdminController
{

    public function getService(){

        try{
            $model= new Service();
            $service=$model->getService();
            $this->data["service"]=$service;
            return view("admin.pages.service.table",$this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function serviceForm(){
        return view('admin.pages.service.insert',$this->data);
    }

    public function fetch_data(Request $request){
        if($request->ajax()){
            $model= new Service();
            $pag=$model->getService();
            return response()->json($pag);
        }
    }

    public function insertService(ServiceRequest $request){
        if($request->has("addService")){

            $model=new Service();
            $img=new Image();
            $name=$request->input("serviceName");
            $text=$request->input("serviceText");
            $price=$request->input("servicePrice");
            $file=$request->file("image");
            $user=session()->get("user")->idUser;

            $imeFajla = time().$file->getClientOriginalName();

            if($file->isValid()){
                $file->move(public_path()."/images/", $imeFajla);
                try{
                    $idService=$model->insertService($name,$text,$price,$user);
                    $insertImage=$img->insertImage($imeFajla,$name,$idService);
                    return redirect()->back()->with("message", "Uspešno unet projekat!");
                }
                catch(QueryException $ex) {
                    return redirect()->back()->with('message','Greška!');
                    \Log::error($ex->getMessage());
                }
            } else {
                return redirect()->back()->with("message", "Fajl nije validan!");
            }
        }

    }

    public function deleteService(IdRequest $request){
        $id=$request->input('id');
        if(isset($id)){
            try{
                $model= new Service();
                $delete= $model->deleteService($id);
            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška');
                \Log::error($ex->getMessage());
            }
        }
    }

    public function ajaxGetService(){
        try{
            $model=new Service();
            $service=$model->getService();
            return response()->json($service);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function getServiceWithId($id){
        try{
            $model= new Service();
            $service=$model->getServiceWithId($id);
            $this->data['service']=$service;
            return view("admin.pages.service.edit",$this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function updateService(UpdateServiceRequest $request){
        if ($request->has('editService')) {

            $name=$request->input('name');
            $text=$request->input('text');
            $id=$request->input('id');
            $price=$request->input('price');

            $file = $request->file('image');

            try{

                $model = new Service();
                $img = new Image();

                if($request->hasFile('image')){

                    $imeFajla = time().$file->getClientOriginalName();
                    $file->move(public_path()."/images/", $imeFajla);

                    $updateImage=$img->updateImageService($id,$imeFajla,$name,$price);

                }else{
                    $updateImageNo=$img->updateImageServiceNo($id,$name);
                }

                $update=$model->updateService($id,$name,$text,$price);

                if($update){
                    return redirect()->back()->with('message','Projekat je ažuriran!');
                }elseif($update || isset($updateImage)) {
                    return redirect()->back()->with('message','Projekat je ažuriran!');
                }elseif(isset($updateImageNo)){
                    return redirect()->back()->with('message','Projekat je ažuriran!');
                }else{
                    return redirect()->back()->with('message','Product nije ažuriran!');
                }

            }catch(\Exception $ex) {
                return redirect()->back()->with('message',$ex->getMessage());
                \Log::error($ex->getMessage());
            }
        }
    }

}
