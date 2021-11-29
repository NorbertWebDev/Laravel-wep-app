<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MySQL extends Model {

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
    private $SqlRow;
    private $SqlResult;

}
