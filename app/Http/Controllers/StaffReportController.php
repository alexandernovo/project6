<?php

namespace App\Http\Controllers;


use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StaffReportController extends Controller
{
    public function staffreport_view()
    {
        return view('staffreport.views.staffreport');
    }
    public function archive_view()
    {
        return view('staffreport.views.archive');
    }

    public function submitreportdashboard()
    {
        return view('staffreport.views.submitreportdashboard');
    }

    public function incidentreport_staff()
    {
        return view('staffreport.views.incidentreport');
    }

    public function situationalreport_staff()
    {
        return view('staffreport.views.situationalreport');
    }

    public function progressreport_staff()
    {
        return view('staffreport.views.progressreport');
    }

    public function inventoryreport_staff()
    {
        return view('staffreport.views.inventoryreport');
    }

    public function save_new_staffreport(Request $request)
    {
        try {
            DB::beginTransaction();
            $all = $request->all();
            $record_id = $all['record_id'];
            unset($all['record_id']);

            if (!empty($all['datetimeoccurence'])) {
                $all['datetimeoccurence'] = date('Y-m-d h:i:s', strtotime($all['datetimeoccurence']));
            }

            if (!empty($all['dateacquired'])) {
                $all['dateacquired'] = date('Y-m-d', strtotime($all['dateacquired']));
            }

            if ($request->hasFile('filesubmitted') && $request->file('filesubmitted')->isValid()) {
                $filename = $this->moveFile($request->file('filesubmitted'), "filesubmitted");
                $all['filesubmitted'] = $filename;
            }

            if ($record_id == 0) {
                $all['status'] = "ACTIVE";
                $all['process_status'] = "Pending";
                Record::create($all);
            } else {
                Record::where("record_id", $record_id)->update($all);
            }

            DB::commit();

            $user = Auth::user();
            $message = $user->usertype == "ADMIN" ? "Report Saved Successfully" : "Report Saved Successfully, Please view your archive.";

            return response()->json([
                'status' => 'success',
                'message' => $message
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
        $typeOfRecord = $request->input('typeOfRecord');
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');

        $query = DB::table('records')
            ->leftJoin('users', 'records.staff_id', '=', 'users.id')
            ->select(
                'users.*',
                'records.*',
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

        if (!empty($typeOfRecord)) {
            $query->where("records.typeOfRecord", $typeOfRecord);
        }

        if (!empty($dateFrom) && !empty($dateTo)) {
            $dateFrom = date("Y-m-d", strtotime($dateFrom));
            $dateTo = date("Y-m-d", strtotime($dateTo));
            $query->where(DB::raw("CAST(records.created_at AS DATE)"), ">=", $dateFrom)
                ->where(DB::raw("CAST(records.created_at AS DATE)"), "<=", $dateTo);
        }
        $userData = Auth::user();

        if ($userData->usertype == "STAFF") {
            $query->where('staff_id', $userData->id);
        }

        $totalData = $query->count();

        $data = $query
            ->offset($start)
            ->limit($length)
            ->orderBy('records.created_at', 'DESC')
            ->get();

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalData,
            "data" => $data
        ]);
    }

    public function deleteRecord(Request $request)
    {
        $record_id = $request->record_id;
        Record::where('record_id', $record_id)->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }

    private function moveFile($file, $paths)
    {
        $newFileName = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $path = $file->move(public_path($paths), $newFileName);

        if ($path) {
            return $paths . '/' . $newFileName;
        }

        return false;
    }
}
