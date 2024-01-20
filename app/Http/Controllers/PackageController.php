<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public  function package(){
        try{
            $model= new Package();
            $bronza=$model->onePackage(1);
            $silver=$model->onePackage(2);
            $gold=$model->onePackage(3);
            $this->data["bronza"]=$bronza;
            $this->data["silver"]=$silver;
            $this->data["gold"]=$gold;
            return view('front.pages.package',$this->data);

        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }
}
