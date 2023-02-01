<?php 


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller {

    public function AddEmployee(Request $request) {
     
        $employee = Employee::create(['name' => $request->input('name'), 'email'=>$request->input('email'), 'employee_id'=>$request->input('employee_id')]);

        $returnArray = array();
        if(!empty($employee->id)){
            $returnArray['result'] = true;
            $returnArray['message'] = 'user added successfully!';
        }else{
            $returnArray['result'] = false;
            $returnArray['message'] = 'Issue with adding user';
        }
        
       return response()->json($returnArray, 200);
    }

    public function EditEmployee(Request $request) {
        $employee = Employee::find($request->input('id'));
        
        $returnArray = array();

        if(!empty($employee->id)){
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->employee_id = $request->input('employee_id');
            $employee->save();

            $returnArray['result'] = true;
            $returnArray['message'] = 'user updated';
        }else{
            $returnArray['result'] = false;
            $returnArray['message'] = 'Issue with updating user';
        }
        $msg = "This is a simple message.";
        return response()->json($returnArray, 200);
    }

    public function DeleteEmployee(Request $request) {
        $employee = Employee::find($request->input('id'));
        
        $returnArray = array();

        if(!empty($employee->id)){
            $employee->delete();

            $returnArray['result'] = true;
            $returnArray['message'] = 'user deleted';
        }else{
            $returnArray['result'] = false;
            $returnArray['message'] = 'Issue with deleting user';
        }

        return response()->json($returnArray, 200);
    }
}