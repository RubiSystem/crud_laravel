@extends('layouts.app')
@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb" style="margin-top:30px;">
            <div class="text-center">
                <h3 class="text-success">LISTADO PERSONAS</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('registro.create') }}" title="Create un nuevo registro">Agregar <i class="fas fa-plus-circle"></i>
                 </a>
            </div>
        </div>
</div>
<div class="row">
<div class="col-lg-12 margin-tb">
  <table class="table table-bordered table-responsive-lg" id="lista_registro">
   <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Tipo Doc</th>
            <th>Documento</th>
            <th>edad</th>
            <th>Departamento</th>
            <th>Provincia</th>
            <th>Distrito</th>
           
            <th width="280px">Action</th>
        </tr>
		 </thead>
		  <tbody>
        @foreach ($registro as $regist)
            <tr>
                <td>{{ ++$i}}</td>
				<td>{{ $regist->nombresperson }}</td>
                <td>{{ $regist->typedoc }}</td>
                <td>{{ $regist->numdoc }}</td>                
                <td>{{ $regist->edad }}</td>
                <td>{{ $regist->namedepartment }}</td>
                <td>{{ $regist->nameprovince }}</td>               
                <td>{{ $regist->namedistrict }}</td>               
                <td>
                    <form action="{{route('registro.destroy', $regist->id) }}" method="POST">

                        <a href="{{route('registro.show', $regist->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{route('registro.edit', $regist->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
		  </tbody>
    </table>
	{{$registro->links()}}
    </div>
    </div>
	<script>
	window.onload = function()
	{
		/*$('#lista_registro').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        }
		});*/
		
	}
	</script>
    @endsection