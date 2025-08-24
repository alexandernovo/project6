<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class StaffReportController extends Controller
{
    public function staffreport_view()
    {
        return view('staffreport.views.staffreport');
    }

    public function save_new_staffreport(Request $request)
    {
        try {
            DB::beginTransaction();

            $all = $request->all();
            $record_id = $all['record_id'];
            unset($all['record_id']);

            if ($record_id == 0) {
                $all['status'] = "ACTIVE";
                $all['typeOfRecord'] = "staffreport";
                $all['process_status'] = "Pending";
                Record::create($all);
            } else {
                Record::where("record_id", $record_id)->update($all);
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => "staffreport saved successfully"
            ]);
        } catch (Exception $ex) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => $ex->getMessage(),
            ]);
        }
    }

    public function getstaffreports(Request $request)
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
            )
            ->where("records.typeOfRecord", "staffreport");

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

    public function deletestaffreport(Request $request)
    {
        $record_id = $request->record_id;

        Record::where('record_id', $record_id)->delete();

        return response()->json([
            'status' => 'success',
            'message' => "staffreport deleted successfully"
        ]);
    }
}
