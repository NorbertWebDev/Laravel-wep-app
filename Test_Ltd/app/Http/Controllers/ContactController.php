<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ContactController extends Controller {

    private $Title = "Test_Ltd. - Contact";
    private $Location = "Contact";

    public function Contact() {
        return view('contact', [
            'location' => $this->Location,
            'Title' => $this->Title
        ]);
    }

}
