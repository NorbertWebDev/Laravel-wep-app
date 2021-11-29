<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MySqlController extends Controller {

    private $ConnectionName;
    private $Connection;
    // To Store values for make a connection to the database
    private $ConnectionHost;
    private $ConnectionUsername;
    private $ConnectionPassword;
    private $ConnectionDatabase;
    private $ConnectionPort;
    // To store the status of the database connection
    private $ConnectionStatus;
    // To store the sql command related data
    private $SqlCommand;
    private $SqlCommandType;
    // To store the sql query data
    private $SqlQuery;
    // To store the result of the database query
    private $SqlRow = [];
    private $SqlResult = [];

    public function MySqlDatabase() {
        
    }

    // Get and set the ConnectionString value for the current process
    private function loadConnectionValues($ConnectionName) {
        $this->ConnectionName = $ConnectionName;

        if ($this->ConnectionName == "Booking") {
            $this->ConnectionHost = 'localhost';
            $this->ConnectionUsername = 'booking';
            $this->ConnectionPassword = 'Bn2/E+7%T4+0!9&Aq÷T¤8Qg142&A6EE!*A5s÷¤Q4%';
            $this->ConnectionDatabase = 'test_ltd';
            $this->ConnectionPort = '3310';
        } else if ($this->ConnectionName == "Contact") {
            $this->ConnectionHost = 'localhost';
            $this->ConnectionUsername = 'contact';
            $this->ConnectionPassword = 'ß3aG%eT$29¤jI04&%T7hZ!+tUiP27r%=+W8+B÷KjL';
            $this->ConnectionDatabase = 'test_ltd';
            $this->ConnectionPort = '3310';
        } else if ($this->ConnectionName == "Menu") {
            $this->ConnectionHost = 'localhost';
            $this->ConnectionUsername = 'menu';
            $this->ConnectionPassword = '&B@5!E2+%n4!7+3ßb-UZ+5u--7=9$4n+D=&@4gT8/U';
            $this->ConnectionDatabase = 'test_ltd';
            $this->ConnectionPort = '3310';
        }
    }

    // Set the ConnectionString value on the Connection object
    private function makeConnection() {
        $this->Connection = new \mysqli($this->ConnectionHost, $this->ConnectionUsername, $this->ConnectionPassword, $this->ConnectionDatabase, $this->ConnectionPort);
    }

    // Run the given sql command or query to the database
    private function runCommand($SqlCommandType) {
        $this->SqlCommandType = $SqlCommandType;

        $this->SqlQuery = $this->Connection->query($this->SqlCommand);

        // Select
        if ($this->SqlCommandType == 0) {
            if ($this->SqlQuery->num_rows > 0) {
                while($this->SqlRow = $this->SqlQuery->fetch_all(MYSQLI_ASSOC))
                {
                    $this->SqlResult = $this->SqlRow;
                }

                return true;
            } else {
                return false;
            }
        } // Insert, update, delete
        else if ($this->SqlCommandType == 1) {
            if ($this->SqlQuery === true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // Close the database connection
    private function closeConnection() {
        $this->Connection->close();
    }

    // Make the book entry sql command for book row in the database
    private function setInsertBookingEntrySql($FullName, $Email, $PhoneOrMobile, $Date, $Persons, $Comment) {
        // FullName, Email, PhoneOrMobile, Date, Persons, Comment
        $this->SqlCommand = "CALL `test_ltd`.`book_a_table`('" . $FullName . "','" . $Email . "','" . $PhoneOrMobile .
                "','" . $Date . "','" . $Persons . "','" . $Comment . "')";

        $this->SqlCommandType = 1;
    }

    // Make the contact entry sql command for contact row in the database
    private function setInsertContactEntrySql($FullName, $Email, $Subject, $Message) {
        // FullName, Email, Subject, Message
        $this->SqlCommand = "CALL `test_ltd`.`create_contact_item`('" . $FullName . "','" . $Email . "','" . $Subject .
                "','" . $Message . "')";

        $this->SqlCommandType = 1;
    }

    // Call the view from the database for get all rows to show the menu
    private function setGetAllMenuItemsSql() {
        $this->SqlCommand = "SELECT * FROM test_ltd.get_all_active_menu_items";

        $this->SqlCommandType = 0;
    }

    // Run the full process for create a booking row in the related database table
    public function insertBookingEntry($FullName, $Email, $PhoneOrMobile, $Date, $Persons, $Comment) {
        $this->ConnectionName = "Booking";

        $this->loadConnectionValues($this->ConnectionName);
        $this->makeConnection();
        $this->setInsertBookingEntrySql($FullName, $Email, $PhoneOrMobile, $Date, $Persons, $Comment);
        $this->runCommand($this->SqlCommandType);
        $this->closeConnection();
    }

    // Run the full process for create a contact row in the related database table
    public function insertContactEntry($FullName, $Email, $Subject, $Message) {
        $this->ConnectionName = "Contact";

        $this->loadConnectionValues($this->ConnectionName);
        $this->makeConnection();
        $this->setInsertContactEntrySql($FullName, $Email, $Subject, $Message);
        $this->runCommand($this->SqlCommandType);
        $this->closeConnection();
    }

    // Run the full process for get menu row(s) from the related database table
    public function getAllMenuItems() {
        $this->ConnectionName = "Menu";

        $this->loadConnectionValues($this->ConnectionName);
        $this->makeConnection();

        if ($this->Connection->connect_errno === 0) {
            $this->setGetAllMenuItemsSql();
            $this->runCommand($this->SqlCommandType);
            $this->closeConnection();
            return $this->SqlResult;
        } else {
            return false;
        }
    }

}
