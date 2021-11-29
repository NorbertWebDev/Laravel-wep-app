<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model {

    public $FullName;
    public $Email;
    public $Subject;
    public $Message;
    private $Response;

}
