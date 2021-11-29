<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class GalleryController extends Controller {

    private $Title = "Test_Ltd. - Gallery";
    private $Location = "Gallery";

    public function Gallery() {
        return view('gallery', [
            'Location' => $this->Location,
            'Title' => $this->Title
        ]);
    }

}
