<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller {

    private $Message;
    private $MessageText;
    private $MessageValue;
    private $FinalMessage;

    private function checkVariable($MessageText, $MessageValue) {
        // Run basic validations on the MessageText, and the MessageValue
        if (gettype(strval($MessageText)) == "string" && gettype(strval($MessageValue)) == "string") {
            return $MessageText . $MessageValue;
        } else {
            return "false";
        }
    }

    public function createMessage($MessageText, $MessageValue) {
        $this->Message = new Message();
        $this->Message->MessageText = $MessageText;
        $this->Message->MessageValue = $MessageValue;

        // Construct the full final message, and return that value
        $this->FinalMessage = $this->checkVariable($this->Message->MessageText, $this->Message->MessageValue);
        return $this->FinalMessage;
    }

}
