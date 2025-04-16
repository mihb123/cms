<?php

namespace Modules\Cms\Backend\Controllers;

use Auth;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\Models\Admin;


/**
 * Handle dashboard requests
 * @package Modules\Backend
 */
class DashboardController extends Controller
{
    protected $module = '';

    public function __construct(){
    }

    public function index()
    {
        return view('backend::dashboard.index');
    }
}
