<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;


class RegistroController extends Controller
{
    
    public function index()
    {
        $registro = Registro::latest()->paginate(5);

        return view('registro.list', compact('registro'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
	public function create()
    {
        return view('registro.create');
    }
	public function store(Request $request)
    {
		
        $request->validate([
            'typedoc' => 'required',
            'numdoc' => 'required|max:15',
            'nombresperson' => 'required|max:250',
			 'edad' => 'required|max:3',
            'namedepartment' => 'required', 
			'department_id' => 'required',			
            'nameprovince' => 'required',
			'province_id' => 'required',
            'district_id' => 'required',            
            'namedistrict' => 'required'
           
        ]);

        Registro::create($request->all());

        return redirect()->route('registro.index')
            ->with('success', 'registro creado successfully.');
    }
	public function show(Registro $registro)
    {
        return view('registro.show', compact('registro'));
    }
	 public function edit(Registro $registro)
    {
        return view('registro.edit', compact('registro'));
    }
	public function update(Request $request, Registro $registro)
    {
         $request->validate([
            'typedoc' => 'required',
            'numdoc' => 'required|max:15',
            'nombresperson' => 'required|max:250',
			 'edad' => 'required|max:3',
           'namedepartment' => 'required', 
			'department_id' => 'required',			
            'nameprovince' => 'required',
			'province_id' => 'required',
            'district_id' => 'required',            
            'namedistrict' => 'required'
           
        ]);
        $registro->update($request->all());

        return redirect()->route('registro.index')
            ->with('success', 'Registro actualizado successfully');
    }
	public function destroy(Registro $registro)
    {
        $registro->delete();

        return redirect()->route('registro.index')
            ->with('success', 'Registro eliminado successfully');
    }
}
