<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SpecialsController extends Controller {

    private $Title = "Test_Ltd. - Specials";
    private $Location = "Specials";

    public function Specials() {
        return view('specials', [
            'location' => $this->Location,
            'Title' => $this->Title
        ]);
    }

}
