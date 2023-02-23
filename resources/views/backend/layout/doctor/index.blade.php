@extends('backend.home')

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

@endsection

@section('content')

<div class="container-fluid">

	<!-- Page Heading -->
	<h3 class="text text-info">Doctor List</h3>
	<a href="{{ route('doctor_registration_form') }}" class="btn btn-info" style="margin-bottom: 10px;"> Add new Doctor</a>

	<div class="row">
		<div class="col-md-12">
			{{--  Doctor List  Start   --}}
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>SN</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Department</th>
									<th>Gender</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>SN</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Department</th>
									<th>Gender</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
							    <?php $i = 1;?>
								@foreach( $data['doctors'] as $doctor )
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{ $doctor->name }}</td>
										<td>{{ $doctor->phone }}</td>
										<td>{{ $doctor->department }}</td>
										<td>{{ $doctor->gender }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('doctor_show', $doctor->id) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-xs btn-success" href="{{ route('doctor_edit', $doctor->id) }}"><i class="fa fa-edit"></i></a>
                                            
										</td>
									</tr
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{--  Doctor List  Start   --}}

		</div>
	</div>

</div>

@endsection
