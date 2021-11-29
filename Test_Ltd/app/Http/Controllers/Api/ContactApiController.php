<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MySqlController;
use App\Http\Controllers\ValidationController;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactApiController extends Controller {

    private $Contact;
    private $Validator;
    // Define the result of the current validtion process
    private $Response = [];
    private $Database;

    public function ContactCreate(Request $request) {
        if ($request) {
            $this->Contact = new Contact();
            $this->Contact->FullName = $request->input('FullName');
            $this->Contact->Email = $request->input('Email');
            $this->Contact->Subject = $request->input('Subject');
            $this->Contact->Message = $request->input('Message');

            /*
             * Create a generalValidations object instance
             * Run validate processes what is depend on the values
             */
            $this->Validator = new ValidationController();
            $this->Response[0] = $this->Validator->runGeneralValidations("FullName", $this->Contact->FullName, "string", 8, 200);
            $this->Response[1] = $this->Validator->runGeneralValidations("Email", $this->Contact->Email, "string", 5, 400);
            $this->Response[2] = $this->Validator->runGeneralValidations("Subject", $this->Contact->Subject, "string", 1, 200);
            $this->Response[3] = $this->Validator->runGeneralValidations("Message", $this->Contact->Message, "string", 1, 65535);

            if ($this->Response[0] === 'true' && $this->Response[3] === 'true') {
                if (is_null($this->Contact->Email === false)) {
                    if ($this->Response[1] === 'false') {
                        return response()->json(['status' => 'error', 'fields' => $this->Response, 'text' => 'Your message cannot be sent, due to wrong email data. Please try again later. Thank you for your patience.'], 500);
                    }
                }

                if (is_null($this->Contact->Subject) === false) {
                    if ($this->Response[2] === 'false') {
                        return response()->json(['status' => 'error', 'fields' => $this->Response, 'text' => 'Your message cannot be sent, due to wrong phone or mobile data. Please try again later. Thank you for your patience.'], 500);
                    }
                }

                /*
                 * Create a MySqlDatabase object instance
                 * Run the insert a booking row to the related database table
                 */
                $this->Database = new MySqlController();

                $this->Database->insertContactEntry($this->Contact->FullName, $this->Contact->Email, $this->Contact->Subject, $this->Contact->Message);

                return response()->json(['status' => 'done', 'text' => 'Your message sent to us, and we will be contat you as soon as possible'], 200);
            } else {
                return response()->json(['status' => 'error', 'fields' => $this->Response, 'text' => 'Your message cannot be sent, due to wrong given data. Please try again later. Thank you for your patience.'], 500);
            }
        } else {
            return response()->json(['status' => 'error', 'text' => 'Your message cannot be sent, and please try again later. Thank you for your patience.'], 400);
        }
    }

}
