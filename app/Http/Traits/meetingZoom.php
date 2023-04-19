<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

trait meetingZoom
{

    public function createMeetingZoom($request) {




        $meeting = Zoom::meeting()->make([
            'topic'=>$request->name,
            'duration'=>$request->num,
            'password'=>$request->password,
            'start_time'=>$request->start,
            'timezone'=>'Africa/Cairo'
        ]);

        $user = Zoom::user()->first()->meetings()->save($meeting);

//        $meeting->settings()->make([
//            'join_before_host' => true,
//            'approval_type' => 1,
//            'registration_type' => 2,
//            'enforce_login' => false,
//            'waiting_room' => false,
//        ]);

        dd($user);

//         $user->meetings()->save($meeting);
    }

}
