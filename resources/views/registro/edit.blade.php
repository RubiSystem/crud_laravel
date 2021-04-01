@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top:30px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left margin-tb">
                <h2 class="text-primary text-center">Editar Registro</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('registro.index') }}" title="Go back"> <i
                        class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hubo un problema con la actualizacion.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	<div class="row card card-container">
	<div class="clearfix"></div>
    <form role="form" action="{{ route('registro.update',$registro->id) }}" method="POST">
	<fieldset>
        @csrf
        @method('PUT')		
			<input type='hidden' name="typedoc"  id="typedoc"  value="{{$registro->typedoc}}"/>
			<input type='hidden' name="namedepartment"  id="namedepartment"  value="{{$registro->namedepartment}}" />
			<input type='hidden' name="nameprovince"  id="nameprovince"  value="{{$registro->nameprovince}}"/>
			<input type='hidden' name="namedistrict"  id="namedistrict" value="{{$registro->namedistrict}}" />
	
        <div class="row">
            <div class="col-xs-12 inputlg" >
                <div class="form-group">
                   <label for="nombresperson" class="control-label font-weight-bold ">Nombre:</label><br>
                    <input type="text" name="nombresperson" value="{{ $registro->nombresperson }}" class="form-control" placeholder="Nombre y apellido" maxlength="250" >
                </div>
            </div>
			<div class="clearfix"></div>
            <div class="col-xs-12 inputlg">
                <div class="form-group"> 				
				 <label for="nombresperson" class="control-label font-weight-bold ">Tipo Documento:</label><br>
					<div class="col-xs-4">						
                     <select class="form-control" style="width:250px" name="typedoc_id"  id="typedoc_id">
					<option value="">Seleccione</option>						
					</select>
					 </div>
					 <div class="clearfix"></div>
                </div>
            </div>				
			<div class="col-xs-12 col-sm-12 col-md-12 inputlg">
                <div class="form-group"> 
				<label for="numdoc" class="control-label font-weight-bold "> Documento:</label><br>
						<div class="col-xs-4">				
							<input type="text" name="numdoc" class="form-control" placeholder="{{ $registro->numdoc }}"
                        value="{{ $registro->numdoc }}" maxlength="15" >
						</div>
						<div class="clearfix"></div>	
                </div>
            </div>
			
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> 
				<label for="edad" class="control-label font-weight-bold "> Edad:</label><br>				
					<div class="col-xs-4">
                   <input type="text" name="edad" id="edad" class="form-control" placeholder="edad"
                        value="{{ $registro->edad }}" maxlength="3">
					</div>
					<div class="clearfix"></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
					<label for="Departamento" class="control-label font-weight-bold "> Departamento:</label><br>	
					<select class="form-control" style="width:250px" name="department_id" id="Departamento">
					<option value="">Seleccione</option>
					
					</select>                    
                </div>
            </div>
			<div class="clearfix"></div>
			 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
					<label for="Provincia" class="control-label font-weight-bold "> Provincia:</label><br>
					<select class="form-control" style="width:250px" name="province_id" id="Provincia">	
					<option value="{{ $registro->province_id }}" SELECTED>{{ $registro->nameprovince }}</option>
					</select>              
                </div>
            </div>
			<div class="clearfix"></div>
			 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
					<label for="Distrito" class="control-label font-weight-bold "> Distrito:</label><br>
					<select class="form-control" style="width:250px" name="district_id" id="Distrito">					
					<option value="{{ $registro->district_id }}" SELECTED >{{ $registro->namedistrict }}</option>
					</select>                     
                </div>
				
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
		</fieldset>
    </form>
	</div>
	<style>
	.card{
	 padding:25px;
	 background:#d3ecd4;
	}
	</style>
	<script>
	const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	window.onload = function()
	{	get_departamento();
		get_type_documento();
		
		$("#Departamento").change(function(){get_ubigeo(this,1);
		if(this.value!=''){$("#namedepartment").val($(this).find('option:selected').text());}
			});
		$("#Provincia").change(function(){get_ubigeo(this,2);
		if(this.value!=''){$("#nameprovince").val($(this).find('option:selected').text());}
			});
		$("#Distrito").change(function(){
			if(this.value!=''){$("#namedistrict").val($(this).find('option:selected').text());}
			});
		$("#typedoc_id").change(function(){ $("#typedoc").val($(this).find('option:selected').text());});
		
			$('form').validate({	
        rules: {
            nombresperson: {
                minlength: 3,
                maxlength: 250,
                required: true
            },
            typedoc_id: {
                minlength: 1,                
                required: true
            },
			 numdoc: {
                minlength: 5,
				 maxlength: 15,	
                required: true
            },
			 edad: {
                minlength: 1,
				 maxlength: 3,	
                required: true
            },
			 department_id:
			 {
                minlength: 1,                
                required: true
            },
			province_id: {
                minlength: 1,                
                required: true
            },
			district_id: {
                minlength: 1,                
                required: true
            }
			
        },
		messages: { nombresperson:{required: "ingrese su nombre",minlength:"ingrese al menos 3 caracteres"},'typedoc_id': "Indique el tipo de documento",numdoc:{required: "Escriba el numero de documento",minlength:"ingrese al menos 5 caracteres"},'edad':"por favor indique su edad",'department_id':"indique el departamento",'province_id':"indique la provincia",'district_id':"indique su distrito"},
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement:'label',
        errorClass:'help-block',
        errorPlacement: function(error, element) 
		{
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else 
			{error.insertAfter(element);}
		}
		});
		
	}
		function get_departamento()
		{
			let department_id='{{$registro->department_id}}';		
			
			let select_id="";
		  $.ajax({
          url:'./../../department',
          data:{},
          type:'GET',
          dataType:'json',
          success: function (response) 
		  {
            var opciones ="<option value=''>seleccione</option>";
            for (let i in response.lista) 
			{	select_id=(response.lista[i].id==department_id)?'selected':'';
               opciones+= "<option value='"+response.lista[i].id+"' "+select_id+">"+response.lista[i].name_tbl+"</option>";
            }
			$("#Departamento").html(opciones);			
          },
          statusCode: {
             404: function() {
                alert('not found');
             }
          },
          error:function(x,xs,xt){              
              //window.open(JSON.stringify(x));
			  console.log(JSON.stringify(x));
              //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
          }
			});
			
		}
		
		function get_ubigeo(p,n)
		{
			
		 if(n=='1')
		 {dest='Provincia';ruta='departamento';$("#Provincia").empty();}
		 else if(n=='2')
		 {dest='Distrito';ruta='provincia';	 }
		 else{ return false;}
			
		 $("#Distrito").empty();
		  
		  $.ajax({
          url:'./../../'+ruta+'_filter/'+p.value,
          data:{},
          type:'GET',
          dataType:'json',
          success: function (response) 
		  {
            var opciones ="<option value=''>seleccione</option>";
				for (let i in response.lista) 
				{
               opciones+= '<option value="'+response.lista[i].id+'">'+response.lista[i].name_tbl+'</option>';
				}	
			$("#"+dest).html(opciones);			
          },
          statusCode: {
             404: function() {
                alert('not found');
             }
          },
          error:function(x,xs,xt){              
              //window.open(JSON.stringify(x));
			  console.log(JSON.stringify(x));
              //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
          }
			});
		}
		
		function get_type_documento()
		{
		 let type_doc='{{$registro->typedoc}}';
		 let select_doc="";
		 
		  $.ajax({
          url:'./../../tipo_documento',
          data:{},
          type:'GET',
          dataType:'json',
          success: function (response) 
		  {
			 
            var opciones ="<option value=''>seleccione</option>";
            for (let i in response.lista) {
				select_doc=(response.lista[i].typedoc==type_doc)?'selected':'';
               opciones+= '<option value="'+response.lista[i].id+'" '+select_doc+' >'+response.lista[i].typedoc+'</option>';
            }
			$("#typedoc_id").html(opciones);			
          },
          statusCode: {
             404: function() {
                alert('not found');
             }
          },
          error:function(x,xs,xt){              
              //window.open(JSON.stringify(x));
			  console.log(JSON.stringify(x));
              //alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
          }
			});
		}
		
	
	</script>
@endsection
