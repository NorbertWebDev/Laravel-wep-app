<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AboutController extends Controller {

    private $Title = "Test_Ltd. - About";
    private $Location = "About";

    public function About() {
        return view('about', [
            'Location' => $this->Location,
            'Title' => $this->Title
        ]);
    }

}
