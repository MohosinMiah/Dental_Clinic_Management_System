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
	<h3 class="text text-info">Notice List</h3>
	<a href="{{ route('notice_added_form') }}" class="btn btn-info" style="margin-bottom: 10px;"> Add New Notice</a>

	<div class="row">
		<div class="col-md-12">
			{{--  notice List  Start   --}}
			<!-- DataTales Example -->
			<div class="card shadow mb-4">

				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>SN</th>
									<th>Title</th>
									<th>Description</th>
									<th>Create At</th>
									<th>Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>SN</th>
									<th>Title</th>
									<th>Description</th>
									<th>Create At</th>
									<th>Action</th>
								</tr>
							</tfoot>
							<tbody>
							    <?php $i = 1;?>
								@foreach( $data['notices'] as $notice )
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{ $notice->title }}</td>
										<td>{{ Str::words( $notice->description, 8, ' (...)') }}</td>
										<td>{{ $notice->created_at }}</td>
										<td>
											<a class="btn btn-xs btn-info" href="{{ route('notice_show', $notice->id) }}"><i class="fa fa-eye"></i></a>
											<a class="btn btn-xs btn-success" href="{{ route('notice_edit', $notice->id) }}"><i class="fa fa-edit"></i></a>
											

										</td>
									</tr
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>

			{{--  notice List  Start   --}}

		</div>
	</div>

</div>

@endsection
