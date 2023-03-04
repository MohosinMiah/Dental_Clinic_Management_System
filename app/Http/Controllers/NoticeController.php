<?php

namespace App\Http\Controllers;

use App\Models\Notice;
// use App\Http\Requests\StoreNoticeRequest;
// use App\Http\Requests\UpdateNoticeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Illuminate\Routing\Redirector;

class NoticeController extends Controller
{

	public function __construct( Request $request, Redirector $redirect )
	{
		
		// if( session( 'isLogin' ) == false or empty( session( 'name' ) )  or session( 'name' ) == null )
		// {
		// 	$redirect->to('/login')->send();
		// }
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$notices = Notice::orderBy( 'id','DESC' )->get();
		$data = [
			'notices' => $notices
		];
		return view('backend.layout.notice.index',compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('backend.layout.notice.add');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreNoticeRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validatedData = $request->validate([
			'title' => 'required',
			'description' => 'required',
		]);

		$notice = new Notice;

		$notice->title = $request->title;
		$notice->description = $request->description;
		if( $request->hasfile('image') )
		{
			$image = $request->image;
			$imageName= time().'_'.$image->getClientOriginalName();
			$image->move(public_path().'/images/', $imageName);  
			$notice->image =  $imageName;
		}
        $notice->user_id = session( 'authorID' );

		$notice->save();

		return redirect(route('notice_added_form'))->with('status', 'Form Data Has Been Inserted');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Notice  $notice
	 * @return \Illuminate\Http\Response
	 */
	public function show( $noticeID )
	{
		$notice = DB::table( 'notices' )::where( 'id' , $noticeID )->first();

		$data = [
            'notice' => $notice
        ];

		return view( 'backend.layout.notice.show' , compact( 'data' ) );
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Notice  $notice
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $noticeID )
	{
		$notice = DB::table( 'notices' )::where( 'id' , $noticeID )->first();
		$data = [
			'notice' => $notice
		];

		return view( 'backend.layout.notice.edit' , compact( 'data' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateNoticeRequest  $request
	 * @param  \App\Models\Notice  $notice
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $noticeID )
	{

		$validatedData     = $request->validate([
			'title'        => 'required',
			'description'  => 'required',
		]);
 
		$notice               = Notice::where( 'id' , $noticeID )->first();
		$notice->title        = $request->title;
		$notice->description  = $request->description;

		if( $request->hasfile('image') )
		{
			$image = $request->image;
			$imageName= time().'_'.$image->getClientOriginalName();
			$image->move(public_path().'/images/', $imageName);  
			$notice->image =  $imageName;
		}
		$notice->user_id = session( 'authorID' );

		$notice->save();

		return redirect( route('notice_edit', $noticeID ) )->with('status', 'Form Data Has Been Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Notice  $notice
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $noticeID )
	{
		$status = Notice::where( 'id' , $noticeID )->firstOrFail();
		$status->destroy();
		if( $status )
		{
			return redirect( route('notice_list') );
		}

	}
}
