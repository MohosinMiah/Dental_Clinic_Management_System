<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
  
    <title>
    <?php
        if( session( 'isLogin' ) == true && !empty( session( 'name' ) ) )
        {
            echo session( 'clinic_name' );
        }else{
            header('Location: http://127.0.0.1:8000/login');
            exit;
        }
    ?>
</title>
<?php
	if(  !empty( session( 'clinic_image' ) ) )
	{
		$faviconURL = "/images/" . session( 'clinic_image' );
	}
	else
	{
		$faviconURL = "/img/undraw_profile.png";
	}
	?>
  <link rel="icon" type="image/x-icon" href="{{ $faviconURL }}">
  
  <meta property="og:title" content="Dental Clinic Automation System By Monkey King BD" />
<meta property="og:description" content="Dental Clinic Automation System used in Dental Hospital or Clinic to Automate the process" />
<meta property="og:image" content="{{ $faviconURL }}" />


    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset( 'css/style.css' ) }}" rel="stylesheet">

    {{--  Services Product List Use Only   --}}
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    {{--  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>  --}}

    <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
  @yield( 'css' )