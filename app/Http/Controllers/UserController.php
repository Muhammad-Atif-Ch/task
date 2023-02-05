<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function result(Request $request)
    {
        $schedules = [
            [
                ['09:00', '11:30'],
                ['13:30', '16:00'],
                ['16:00', '17:30'],
                ['17:45', '19:00']
            ],
            [
                ['09:15', '12:00'],
                ['14:00', '16:30'],
                ['17:00', '17:30']
            ],
            [
                ['11:30', '12:15'],
                ['15:00', '16:30'],
                ['17:45', '19:00']
            ],
        ];
        if ($request->user == 'a') {
            $user = 0;
        } elseif ($request->user == 'b') {
            $user = 1;
        } else if ($request->user == 'c') {
            $user = 2;
        } else {
            return "User not found";
        }

        $earliestTime = $this->getEarliestMeetingTime($schedules, $request->time, $user);

        if ($earliestTime === null) {
            //A 60-minute meeting would be at 12:15

            return  redirect()->back()->with("data", "No available time found");
        } else {
            return  redirect()->back()->with("data", "$request->user $request->time-minute meeting would be at $earliestTime");
        }
    }

    function getEarliestMeetingTime(array $schedules, $duration, $person)
    {
        $start_time = strtotime('09:00');
        $end_time = strtotime('19:00');

        $duration = $duration * 60;

        $free_times = [];
        $timestamps = [];

        foreach ($schedules[$person] as $time) {
            $timestamps[] = strtotime($time[0]);
            $timestamps[] = strtotime($time[1]);
        }

        // array to store the free times of the current businessperson
        $free = [];

        // loop through the timestamps to find the free times
        for ($i = 0; $i < count($timestamps) - 1; $i++) {
            $start = $timestamps[$i];
            $end = $timestamps[$i + 1];
//dd(date('H:i', $start), date('H:i', $end));
            // if the current meeting is not the last one, add the free time between the meetings
            if ($i + 1 < count($timestamps) - 1) {
                $free[] = [$end, $timestamps[$i + 2]];
            }

            // if the current meeting is the last one, add the free time from the end of the meeting to 19:00
            if ($i + 1 == count($timestamps) - 1) {
                $free[] = [$end, strtotime('19:00')];
            }
        }
//dd(date('H:i', $timestamps[0]));
        // add the free time from 9:00 to the start of the first meeting
        array_unshift($free, [strtotime('09:00'), $timestamps[0]]);

        // store the free times of the current businessperson in the free_times array
        $free_times[] = $free;
//dd($free_times, $free);
        // find the earliest time when every businessperson is free for at least the duration
        while ($start_time <= $end_time) {
            $valid = true;

            $timeStr = date('H:i', $start_time);
            $endTime = date('H:i', $start_time + $duration);
            foreach ($free_times as $free) {
                $found = false;
                foreach ($free as $time) {
                    //dd($start_time + $duration, date('H:i', $start_time), date('H:i', $start_time + $duration), $start_time, $duration);
                    //dd($start_time >= $time[0] && $start_time + $duration <= $time[1], date('H:i', $time[0]), date('H:i', $time[1]));
                    if ($start_time >= $time[0] && $start_time + $duration <= $time[1]) {
                        $found = true;
                        break;
                        //dd("$timeStr-$endTime");
                    }
                }
                if (!$found) {
                    $valid = false;
                    break;
                }
            }
            if ($valid) {
                //dd("$timeStr-$endTime");
                return "$timeStr-$endTime";
            }
            $start_time += 60;
        }

        return null;
    }
}
