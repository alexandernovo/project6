<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class UserController extends Controller
{
    public function user_view()
    {
        return view('user.views.user');
    }
}
