<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ChefsController extends Controller {

    private $Title = "Test_Ltd. - Chefs";
    private $Location = "Chefs";

    public function Chefs() {
        return view('chefs', [
            'Location' => $this->Location,
            'Title' => $this->Title
        ]);
    }

}
