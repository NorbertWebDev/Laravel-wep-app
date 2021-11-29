<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MySqlController;

class MenuController extends Controller {

    private $Menu;
    private $Title = "Test_Ltd. - Menu";
    private $Location = "Menu";
    private $Database;

    public function Menu() {
        // Create a MySqlDatabase object instance
        $this->Database = new MySqlController();
        
        // Get the menu rows from the database
        $this->Menu = $this->Database->getAllMenuItems();

        return view('menu', [
            'Location' => $this->Location,
            'Title' => $this->Title,
            'Menu' => $this->Menu
        ]);
    }

}
