<?php

namespace App\Http\Controllers;

use App\Venue;
use App\Event;
use App\Location;
use App\Booking;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
    	$locations = location::whereStatus(1)->get();
    	return view('welcome', compact('locations'));
    }

	public function getVenues($location_id)
	{
		$venues = Venue::where(['status' => 1, 'location_id' => $location_id])->get();
		return response()->json(['status'=>'success','data'=>$venues], 200);
	}

	public function getShows($venue_id)
	{
		$shows = Event::where(['status' => 1, 'venue_id' => $venue_id])->get();
		return response()->json(['status'=>'success','data'=>$shows], 200);
	}

	public function getBooking($booking_code)
	{
		$booking = Booking::where(['code' => $booking_code])->with('event')->first();
		return response()->json(['status'=>'success','data'=>$booking], 200);
	}

    public function showHome()
    {
    	return redirect()->route('home');
    }

    public function showTrackPage()
    {
    	return view('track_page');
    }
}
