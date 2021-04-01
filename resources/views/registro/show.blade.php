@extends('layouts.app')


@section('content')
<fieldset>
<div class="row card card-container" style="margin-top:20px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Datos de {{ $registro->nombresperson }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('registro.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label class="control-label font-weight-bold ">Nombre:</label>
                {{ $registro->nombresperson }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
				<label class="control-label font-weight-bold ">Tipo Documento:</label>
                {{ $registro->typedoc }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
			 <label class="control-label font-weight-bold ">Nro Documento:</label>              
                {{ $registro->numdoc }}
            </div>
        </div>  
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
				<label class="control-label font-weight-bold ">Edad:</label>
                {{ $registro->edad }}
            </div>
        </div>		
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
			 <label class="control-label font-weight-bold ">Departamento:</label>                
                {{ $registro->namedepartment }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
			<label class="control-label font-weight-bold ">Provincia:</label>
               
                {{ $registro->nameprovince }}
            </div>
        </div>
		 <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
			<label class="control-label font-weight-bold ">Distrito:</label>               
                {{ $registro->namedistrict }}
            </div>
        </div>
       
    </div>
 </div>
 </fieldset>
 <style>
	.card{
	 padding:25px;
	 background:#d3ecd4;
	}
	</style>
@endsection
