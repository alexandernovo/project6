<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class RecordController extends Controller
{
    public function deleteRecord(Request $request)
    {
        $record_id = $request->record_id;
        Record::where('record_id', $record_id)->delete();
        
        return response()->json([
            'status' => 'success',
        ]);
    }
}
