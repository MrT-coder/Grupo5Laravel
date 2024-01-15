@section('title', __('Comprobantes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fa-solid fa-receipt text-info"></i>
							Comprobantes </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Comprobantes">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Añadir Comprobante
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.comprobantes.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Usuario</th>
								<th>Juego</th>
								<th>Estado Pago</th>
								<th>Ruta Comprobante</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse($comprobantes as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->id_usuarios }}</td>
								<td>{{ $row->id_juegos }}</td>
								<td>{{ $row->estado_pago }}</td>
								<td>{{ $row->ruta_comprobante }}</td>
								<td width="90">
									<div class="dropdown">

										<a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a>
										<a class="dropdown-item" onclick="confirm('Confirm Delete Rol id {{$row->id}}? \nDeleted Rols cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a> 

								</div>						
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No hay información </td>
							</tr>
							@endforelse
						</tbody>
					</table>						
					<div class="float-end">{{ $comprobantes->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>