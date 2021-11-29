<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    private $Title = "Test_Ltd. - Home";
    private $Location = "Home";

    public function Home() {
        return view('home', [
            'Location' => $this->Location,
            'Title' => $this->Title
        ]);
    }

}
