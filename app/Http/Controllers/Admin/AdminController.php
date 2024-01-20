<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $contact;

    public function __construct()
    {
        try{
            $model= new Contact();
            $number=$model->contactNumber();
            $this->data['contactNumber']=$number;
        }catch(\Exception $ex) {
            return redirect()->back()->with('message','Greška!');
            \Log::error($ex->getMessage());
        }
    }
}
