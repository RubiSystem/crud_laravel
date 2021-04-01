<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
       public function index($request)
	   {
		   /*$validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required|email',
            'address' => 'required',
			]);*/		
				
        if(isset($request))
		{            
			$province = Province::where('department_id', $request)->get();

            return response()->json(
                [
                    'lista' => $province,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
					'lista' => '0',
                    'success' => false
                ]
                );

        }

		}
    
   
}
