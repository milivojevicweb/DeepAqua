<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends AdminController
{
    public function package(){

        try{
            $model=new Package();
            $package=$model->packages();
            $this->data['package']=$package;
            return view("admin.pages.package.table",$this->data);
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }

    public function editPricePage($id){
        if(isset($id)){
            try{
                $model= new Package();
                $update=$model->onePackage($id);
                $this->data['package']=$update;
                return view("admin.pages.package.edit",$this->data);
            }catch(\Exception $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
        }
    }

    public function editPackage(PackageRequest $request){
        if($request->has("updatePackage")){

            try{
                $price=$request->input("price");
                $name=$request->input("name");
                $id=$request->input('id');

                $model= new Package();
                $update=$model->editPackage($id,$price,$name);
                if($update){
                    return \redirect()->back()->with('message','Uspešno!');
                } else {
                    return \redirect()->back()->with('message','Greška!');
                }
            }catch(QueryException $ex) {
                return redirect()->back()->with('message','Greška!');
                \Log::error($ex->getMessage());
            }
        }
    }
}
