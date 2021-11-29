<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {

    public $FullName;
    public $Email;
    public $PhoneOrMobile;
    public $Date;
    public $Time;
    public $Persons;
    public $Message;
    private $Response;

}
