<?php

/** --------------------------------------------------------------------------------
 * This controller manages all the business logic for template
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Log;

class Test extends Controller {

    public function __construct() {

        //parent
        parent::__construct();

        //authenticated
        $this->middleware('auth');

        //admin
        $this->middleware('adminCheck');
    }

    /**
     * @return blade view | ajax view
     * - position 11 | 21 | 31 | 41 | 51 | 61 | 71
     * - datatype text date paragraph checkbox dropdown number decimal
     * - limit 10
     * - task client project
     *
     */
    public function index() {


    }

}