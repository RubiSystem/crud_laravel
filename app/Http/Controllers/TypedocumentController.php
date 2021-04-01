<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typedocument;

class TypedocumentController extends Controller
{
    public function index()
    {
		$typedocument = TypeDocument::all();				
		return response()->json(['lista' => $typedocument,'success' => true]);
    } 
}
