<?php

namespace App\Http\Controllers;

use App\Event;
use App\Booking;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the booking details.
     *
     * @return \Illuminate\Http\Response
     */
    public function booking($event_code)
    {
        $show = Event::where(['status' => 1, 'code' => $event_code])->first();
        return view('booking', compact('show'));
    }

    /**
     * Book the ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookShow(Request $request)
    {
        $show = Event::where(['status' => 1, 'code' => $request->get('event_code')])->first();
        if($show) {
            if($show->seats_available >= $request->get('seats')) {
                $booking = new Booking;
                $booking->user_id = auth()->user()->id;
                $booking->code = $booking->generateCode();
                $booking->event_id = $show->id;
                $booking->seats = $request->get('seats');
                $booking->amount = $show->price * $request->get('seats');
                $booking->booking_date = date('Y-m-d H:i:s');
                $booking->status = 1;
                $booking->save();

                $show->decrement('seats_available', $request->get('seats'));
                $show->save();

                $booking_code = $booking->code;

                return view('booking_confirmation', compact('show','booking_code'));
            } else {
                $message = 'Requested seats are not available';
                return view('booking_msg', compact('message'));
            }
        }
        $message = 'Show unavailable';
        return view('booking_msg', compact('message'));
    }

    public function cancelBooking(Request $request)
    {
        $booking = Booking::where(['status' => 1, 'code' => $request->get('booking_code')])->with('event')->first();

        $show = Event::where(['status' => 1, 'id' => $booking->event_id])->first();

        $booking->status = 3;
        $booking->cancell_date = date('Y-m-d H:i:s');
        $booking->save();

        $show->increment('seats_available', $booking->seats);
        $show->save();

        return view('booking_status', compact('booking'));
    }

    /**
     * Show the users bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBookings()
    {
        $bookings = Booking::where(['user_id' => auth()->user()->id])->with('event')->get();
        return view('my_bookings', compact('bookings'));
    }
}
