<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class BookingController extends Controller {

    private $Title = "Test_Ltd. - Booking";
    private $Location = "Booking";

    public function Booking() {
        return view('booking', [
            'Location' => $this->Location,
            'Title' => $this->Title
        ]);
    }

}
