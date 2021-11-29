<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MySqlController;
use App\Http\Controllers\ValidationController;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingApiController extends Controller {

    private $Booking;
    private $Validator;
    // Define the result of the current validtion process
    private $Response = [];
    private $Database;

    public function BookingCreate(Request $request) {
        if ($request) {
            $this->Booking = new Booking();
            $this->Booking->FullName = $request->input('FullName');
            $this->Booking->Email = $request->input('Email');
            $this->Booking->PhoneOrMobile = $request->input('PhoneOrMobile');
            $this->Booking->Date = $request->input('Date');
            $this->Booking->Time = $request->input('Time');
            $this->Booking->Persons = $request->input('Persons');
            $this->Booking->Message = $request->input('Message');

            /*
             * Create a generalValidations object instance
             * Run validate processes what is depend on the values
             */
            $this->Validator = new ValidationController();
            $this->Response[0] = $this->Validator->runGeneralValidations("FullName", $this->Booking->FullName, "string", 8, 200);
            $this->Response[1] = $this->Validator->runGeneralValidations("Email", $this->Booking->Email, "string", 5, 400);
            $this->Response[2] = $this->Validator->runGeneralValidations("PhoneOrMobile", $this->Booking->PhoneOrMobile, "string", 12, 13);
            $this->Response[3] = $this->Validator->runGeneralValidations("Date", $this->Booking->Date, "string", 8, 8);
            $this->Response[4] = $this->Validator->runGeneralValidations("Time", $this->Booking->Time, "string", 8, 8);
            $this->Response[5] = $this->Validator->runGeneralValidations("Persons", intval($this->Booking->Persons), "int", 1, 255);
            $this->Response[6] = $this->Validator->runGeneralValidations("Message", $this->Booking->Message, "string", 1, 65535);

            // Put together the final DateTime value for database
            $this->Booking->Date = $this->Booking->Date . ' ' . $this->Booking->Time;

            if ($this->Response[0] === 'true' && $this->Response[3] === 'true' && $this->Response[4] === 'true' && $this->Response[5] === 'true') {
                if (is_null($this->Booking->Email === false)) {
                    if ($this->Response[1] === 'false') {
                        return response()->json(['status' => 'error', 'fields' => $this->Response, 'text' => 'The booking cannot be made, due to wrong email data. Please try again later. Thank you for your patience.'], 500);
                    }
                }
                if (is_null($this->Booking->PhoneOrMobile) === false) {
                    if ($this->Response[2] === 'false') {
                        return response()->json(['status' => 'error', 'fields' => $this->Response, 'text' => 'The booking cannot be made, due to wrong phone or mobile data. Please try again later. Thank you for your patience.'], 500);
                    }
                }
                if (is_null($this->Booking->Message) === false) {
                    if ($this->Response[6] === 'true') {
                        return response()->json(['status' => 'error', 'fields' => $this->Response, 'text' => 'The booking cannot be made, due to wrong message data. Please try again later. Thank you for your patience.'], 500);
                    }
                }

                /*
                 * Create a MySqlDatabase object instance
                 * Run the insert a booking row to the related database table
                 */
                $this->Database = new MySqlController();
                $this->Database->insertBookingEntry($this->Booking->FullName, $this->Booking->Email, $this->Booking->PhoneOrMobile, $this->Booking->Date, $this->Booking->Persons, $this->Booking->Message);

                return response()->json(['status' => 'done', 'text' => 'The booking is active, and thank you for choosing us!'], 200);
            } else {
                return response()->json(['status' => 'error', 'fields' => $this->Response, 'text' => 'The booking cannot be made, due to wrong given data. Please try again later. Thank you for your patience.'], 500);
            }
        } else {
            return response()->json(['status' => 'error', 'text' => 'The booking cannot be made, and please try again later. Thank you for your patience.'], 400);
        }
    }

}
