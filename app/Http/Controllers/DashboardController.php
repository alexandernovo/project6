<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard_view()
    {
        $recordCounts = DB::table('records')
            ->select('typeOfRecord', DB::raw('COUNT(*) as total'))
            ->groupBy('typeOfRecord')
            ->get();
        $data = ["countDash" => $recordCounts];

        return view('dashboard.views.dashboard', $data);
    }

    public function getreport(Request $request)
    {
        $length = $request->input('length');
        $start = $request->input('start');
        $searchValue = $request->input('search.value');

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
            );

        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('users.address', 'like', "%{$searchValue}%")
                    ->orWhere('users.firstname', 'like', "%{$searchValue}%")
                    ->orWhere('users.middlename', 'like', "%{$searchValue}%")
                    ->orWhere('users.lastname', 'like', "%{$searchValue}%")
                    ->orWhereRaw("(users.firstname + ' ' + users.middlename + ' ' + users.lastname) LIKE ?", ["%{$searchValue}%"])
                    ->orWhereRaw("(users.firstname + ' ' + users.lastname) LIKE ?", ["%{$searchValue}%"])
                    ->orWhereRaw("(users.lastname + ', ' + users.firstname) LIKE ?", ["%{$searchValue}%"]);
            });
        }

        $totalData = $query->count();

        $data = $query
            ->offset($start)
            ->limit($length)
            ->get();

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalData,
            "data" => $data
        ]);
    }

    public function getIncidentReport(Request $request)
    {
        $year = now()->year; // current year, or get from $request if needed

        $counts = Record::where('typeOfRecord', 'INCIDENTREPORT')
            ->selectRaw('MONTH(created_at) as month, typeincident, COUNT(*) as total')
            ->whereYear('created_at', $year)
            ->groupByRaw('MONTH(created_at), typeincident')
            ->orderByRaw('MONTH(created_at)')
            ->get();

        return response()->json([
            "status" => 'success',
            "counts" => $counts
        ]);
    }
}
