<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
		public function index($request)
		{
			 if(isset($request))
			{            
			$district = District::where('province_id',$request)->get();

            return response()->json(
                [
                    'lista' => $district,
                    'success' => true
                ]
                );
			}else{
            return response()->json(
                [	'lista' =>'0',
                    'success' => false
                ]
                );

			}

		}
}
