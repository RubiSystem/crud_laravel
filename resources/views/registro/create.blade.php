@extends('layouts.app')

@section('content')
<fieldset>
<div class="row card card-container" style="margin-top:20px;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left nowrap">
                <h2 class="text-primary text-center">Agregar Nuevo Registro</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('registro.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hubo problema con su ingreso de datos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('registro.store')}}" method="POST" id="form_create" >
        @csrf
			<input type='hidden' name="typedoc"  id="typedoc" >
			<input type='hidden' name="namedepartment"  id="namedepartment" value="" >
			<input type='hidden' name="nameprovince"  id="nameprovince" value="">
			<input type='hidden' name="namedistrict"  id="namedistrict"  value="">
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
				<label for="nombresperson" class="control-label font-weight-bold "> Nombre:</label><br>                  
                    <input type="text" name="nombresperson" value="" class="form-control" placeholder="Nombre y apellido"  maxlength="250">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> 
				<label for="typedoc_id" class="control-label font-weight-bold ">Tipo Documento:</label><br>
                    <select class="form-control"  name="typedoc_id" id="typedoc_id">
					<option value=""></option>					
					</select>
                </div>
            </div>
			 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> 
				<label for="numdoc" class="control-label font-weight-bold ">Nro Documento:</label><br>
                   <input type="text" name="numdoc" class="form-control" placeholder="Nro Documento"
                        value="" style="width:250px"  maxlength="15">
                </div>
            </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group"> 
				<label for="edad" class="control-label font-weight-bold ">Edad:</label><br>						
                   <input type="text" name="edad" id="edad" class="form-control" placeholder="edad"
                        value="" style="width:250px"  maxlength="3">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
				<label for="department_id" class="control-label font-weight-bold ">Departamento:</label><br>
					<select class="form-control"   id="department_id"  name="department_id">
					<option value="">Seleccione</option>
					
					</select>
                    
                </div>
            </div>
			 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
				<label for="province_id" class="control-label font-weight-bold ">Provincia:</label><br>
					<select class="form-control"   name="province_id" id="province_id">
					<option value="">Seleccione</option>					
					</select>
					
                </div>
            </div>
			 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
				
					<label for="district_id" class="control-label font-weight-bold ">Distrito:</label><br>	                  
					<select class="form-control" name="district_id" id="district_id">
					<option value="">Seleccione</option>					
					
					</select>
					
                   
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </form>
	 </div>
</fieldset>
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
		$("#department_id").change(function(){get_ubigeo(this,1);
		if(this.value!=''){$("#namedepartment").val($(this).find('option:selected').text());}
			});
		$("#province_id").change(function(){get_ubigeo(this,2);
		if(this.value!=''){$("#nameprovince").val($(this).find('option:selected').text());}
			});
		$("#district_id").change(function(){
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
			 edad:{
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
		  $.ajax({
          url:'../department',
          data:{},
          type:'GET',
          dataType:'json',
          success: function (response) 
		  {
            var opciones ="<option value=''>seleccione</option>";
            for (let i in response.lista) {
               opciones+= '<option value="'+response.lista[i].id+'">'+response.lista[i].name_tbl+'</option>';
            }
			$("#department_id").html(opciones);			
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
			//console.log(p.name);
		 //let ruta=p.id;
		 if(n=='1')
		 {dest='province_id';ruta='departamento';$("#province_id").empty();}
		 else
		 {dest='district_id';ruta='provincia';	 }	 
		 $("#district_id").empty();
		  
		  $.ajax({
          url:'../'+ruta+'_filter/'+p.value,
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
			$.ajax({
          url:'../tipo_documento',
          data:{},
          type:'GET',
          dataType:'json',
          success: function (response) 
		  {
			  //console.log(response);
            var opciones ="<option value=''>seleccione</option>";
            for (let i in response.lista) {
               opciones+= '<option value="'+response.lista[i].id+'">'+response.lista[i].typedoc+'</option>';
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
