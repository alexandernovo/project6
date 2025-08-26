<?php

namespace App\Http\Controllers;


use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class ReportController extends Controller
{
    public function report_view()
    {
        return view('report.views.report');
    }

    public function incidentreportPrint(Request $request)
    {
        $query = DB::table('records')
            ->leftJoin('users', 'records.staff_id', '=', 'users.id')
            ->select(
                'records.*',
                'users.*',
                DB::raw("
                    CONCAT(
                        users.firstname, ' ',
                        CASE 
                            WHEN users.middlename IS NOT NULL AND users.middlename <> '' 
                            THEN LEFT(users.middlename, 1) + '. ' 
                            ELSE '' 
                        END,
                        users.lastname
                    ) AS fullname
                ")
            )
            ->where("records.typeOfRecord", "INCIDENTREPORT");

        if (!empty($request->query('monthyear'))) {
            $monthYear = $request->query('monthyear');

            $query->whereRaw("FORMAT(records.created_at, 'yyyy-MM') = ?", [$monthYear]);
        }

        $result = $query->get();

        $data = [
            'data' => $result
        ];

        return view('report.views.incidentreportPrint', $data);
    }
}
