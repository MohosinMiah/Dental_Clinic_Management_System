<!-- https://github.com/LaravelDaily/laravel-charts -->
@extends('backend.home')

@section('js')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
{!! $chart1->renderChartJsLibrary() !!}


{!! $chart1->renderJs() !!}
{!! $chart3->renderJs() !!}

@endsection

@section('content')

<div class="container-fluid">
	<!-- Page Heading -->
	<div class="row justify-content-md-center">
		<div class="col-md-12">
			<h1>Graphical Report All In One </h1>
			<div class="card-body">
				<h3>{{ $chart3->options['chart_title'] }}</h3>
				{!! $chart3->renderHtml() !!}
			</div>
		</div>
		<div class="col-md-8 ">
			<div class="card-body">
				<h3>{{ $chart1->options['chart_title'] }}</h3>
				{!! $chart1->renderHtml() !!}
				<hr />
			</div>
		</div>
	</div>
</div>

@endsection

