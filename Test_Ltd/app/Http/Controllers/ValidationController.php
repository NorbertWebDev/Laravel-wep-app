<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;
use App\Models\Validation;
use App\Models\Message;

class ValidationController extends Controller {

    private $Validation;
    private $ValueName;
    private $ValueToValidate;
    private $ValueToType;
    private $ValueToMin;
    private $ValueToMax;
    private $ValidateStringLength;
    private $Message;

// Check that the variable has a value
    private function validateVariableHasValue($ValueToValidate) {
        if (gettype($ValueToValidate) === "unknown type") {
            return false;
        } else {
            return true;
        }
    }

// Check that the variable has a value using another way
    private function validateVariableType($ValueToValidate, $ValueToType) {
        if (strval(gettype($ValueToValidate)) === $ValueToType) {
            return true;
        } else {
            return false;
        }
    }

// Check that the value of the variable is valid or not
    private function validateVariableValueLimits($ValueToValidate, $ValueToType, $ValueToMin, $ValueToMax) {

        $ValueToType = strval(gettype($ValueToType));

        $ValueToMin = intval($ValueToMin);
        $ValueToMax = intval($ValueToMax);

        if ($ValueToType === "int") {
            if ($ValueToValidate >= $ValueToMin && $ValueToValidate <= $ValueToMax) {
                return true;
            } else {
                return false;
            }
        } else if ($ValueToType == "string") {
            $ValidateStringLength = strlen($ValueToValidate);

            if ($ValueToMin == 0) {
                if ($ValidateStringLength <= $ValueToMax) {
                    return true;
                } else {
                    return false;
                }
            } else if ($ValueToMin !== null) {
                if ($ValidateStringLength >= $ValueToMin && $ValidateStringLength <= $ValueToMax) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

// Run the validation methods for variable checking
    public function runGeneralValidations($ValueName, $ValueToValidate, $ValueToType, $ValueToMin, $ValueToMax) {
        $this->Validation = new Validation();
        $this->Validation->ValueName = $ValueName;
        $this->Validation->ValueToValidate = $ValueToValidate;
        $this->Validation->ValueToType = $ValueToType;
        $this->Validation->ValueToMin = $ValueToMin;
        $this->Validation->ValueToMax = $ValueToMax;

        if ($this->validateVariableHasValue($this->Validation->ValueToValidate)) {
            if ($this->validateVariableType($this->Validation->ValueToValidate, $this->Validation->ValueToType)) {
                if ($this->validateVariableValueLimits($this->Validation->ValueToValidate, $this->Validation->ValueToType, $this->Validation->ValueToMin, $this->Validation->ValueToMax)) {
                    return "true";
                } else {
                    $this->Message = new MessageController();

                    return $this->Message->createMessage(" value is not in range.", $this->Validation->ValueName);
                }
            } else {
                $this->Message = new MessageController();

                return $this->Message->createMessage(" value has wrong data type.", $this->Validation->ValueName);
            }
        } else {
            $this->Message = new MessageController();

            return $this->Message->createMessage(" variable hasn't got a value.", $this->Validation->ValueName);
        }
    }

}
