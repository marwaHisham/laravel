<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Employee;
use App\User;
use DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employee = Employee::all();
        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $loc=$request->address;
       
        return view('employee.create',compact('loc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
      
        $user->email=$request->email;
        $user->password=$request->password;
        
     $imagstr="";
            $this->validate(request(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'img'=>'required'
             ]);
             if ($request->hasFile('img')) {
                // dd($request->hasFile('img'));
                   $imagstr=$request->img->store('public');
            }
            $user->name=$request->first_name;
          

             $employee=new Employee();
             $employee->First_name=$request->first_name;
             $employee->Last_name=$request->last_name;
             $employee->Status=$request->Status;
             $employee->Location=$request->location;
             $employee->Job=$request->job;
             $employee->img=$imagstr;
             $employee->Job=$request->job;
           
             
             $user->save(); 
            
             $employee->user_id=$user->id;
       
             $employee->save();
            $employee = Employee::all();
           // return view('employee.index', compact('employee'));

           return view('employee.index',compact('employee'))->with('success', 'Emp has been added');   
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $employee = Employee::find($id);
        $user=User::find($employee->User_id);
        //dd($user);
        $loc=$request->address;
        if ($loc != null){
            $employee->Location=$loc;
        }
        return view('employee.edit',compact('employee','user','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $employee= Employee::find($id);

        $user=User::find($employee->User_id);
      
        $user->email=$request->get('email');
        $user->password=bcrypt($request->get('password'));
       // $user->id=$request->get('id');
        $imagstr="";
            $this->validate(request(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'img'=>'required'
             ]);
             if ($request->hasFile('img')) {
                // dd($request->hasFile('img'));
                   $imagstr=$request->img->store('public');
            }
            $user->name=$request->get('first_name');

             
             $employee->First_name=$request->get('first_name');
             $employee->Last_name=$request->get('last_name');
             $employee->Status=$request->get('Status');
             $employee->Location=$request->get('location');
             $employee->img=$imagstr;
             $employee->Job=$request->get('job');
             $user->save(); 
            
             $employee->user_id=$user->id;
       
             $employee->save();
            $employee = Employee::all();
     
          return view('employee.index', compact('employee'));

          // return redirect('employees')->with('success','Product has been updated');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id) 
       { 
        $employee = Employee::find($id);
       
        $employee->delete();
        return redirect('employees')->with('success','employee has been  deleted');
    }
}
