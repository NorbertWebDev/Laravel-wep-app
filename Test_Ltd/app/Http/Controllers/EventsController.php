<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class EventsController extends Controller {

    private $Title = "Test_Ltd. - Events";
    private $Location = "Events";

    public function Events() {
        return view('events', [
            'Location' => $this->Location,
            'Title' => $this->Title
        ]);
    }

}
