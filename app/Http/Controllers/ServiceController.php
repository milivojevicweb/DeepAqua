<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function page(){

        try{
            $model= new Service();
            $service=$model->getService();
            $this->data["service"]=$service;
            return view('front.pages.service', $this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }

    }

    public function fetch_data(Request $request){
        if($request->ajax()){
            try{
                $model= new Service();
                $service=$model->getService();
                return response()->json($service);
            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
        }
    }

    public function getOneService($id){
        if(isset($id)){
            try{
                $model= new Service();
                $service=$model->getServiceWithId($id);
                $this->data["service"]=$service;
                return view("front.pages.oneService",$this->data);
            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
        }
    }
}
