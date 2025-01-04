<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use App\Models\Lawyer;
use App\Traits\ApiResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class AppointmentController extends Controller implements HasMiddleware
{
    use ApiResponse;

    public static function middleware(): array
    {
        return ["auth:sanctum"];
    }

    public function index()
    {
        $appointments = Appointment::where("user_id", auth("sanctum")->id())->get();
        return $this->success("all Appointments", $appointments);
    }

    public function store(AppointmentRequest $request)
    {
        $request["user_id"] = auth("sanctum")->id();
        $lawyerName = Lawyer::find($request->lawyer_id)->name;
        $booked = Appointment::create($request->toArray());
        return $this->success("Your appointment booking is successful with $lawyerName.", $booked);
    }
}
