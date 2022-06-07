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
	<h1 class="h3 mb-4 text-gray-800"> Doctor List</h1>

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
									<th>Name</th>
									<th>Position</th>
									<th>Office</th>
									<th>Age</th>
									<th>Start date</th>
									<th>Salary</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Name</th>
									<th>Position</th>
									<th>Office</th>
									<th>Age</th>
									<th>Start date</th>
									<th>Salary</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach( $data['doctors'] as $doctor )
									<tr>
										<td>{{ $doctor->name }}</td>
										<td>{{ $doctor->name }}</td>
										<td>{{ $doctor->name }}</td>
										<td>{{ $doctor->name }}</td>
										<td>{{ $doctor->name }}</td>
										<td>{{ $doctor->name }}</td>
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
