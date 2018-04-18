@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Employee</div>

                    <div class="panel-body">
                        <form method="post" action="/update" enctype="multipart/form-data">
                            {{ csrf_field() }}
                             <input type="hidden" name="id" value="{{$employee->id}}"/>
                            First name:
                            <br />
                            <input type="text" name="first_name" value="{{$employee->First_name}}"/>
                            <br /><br />
                            Last name:
                            <br />
                            <input type="text" name="last_name" value="{{$employee->Last_name}}" />
                            <br />
                              Email:
                            <br />
                            <input type="text" name="email" value="{{$user->email}}" />
                            <br /><br />
                            Password:
                            <br />
                            <input type="text" name="password"  />
                            <br />
                            Job:
                            <br />
                            <input type="text" name="job"value="{{$employee->Job}}" />
                            <br /><br />
                             Img
                            <br />
                            <input type="file" name="img" value="{{$employee->img}}"/>
                            <br />
                            Location:
                            <br />
                            <input type="text" name="location"  value="{{$employee->Location}}"/>
                            <a href="/map?page=edit&id={{$employee->id}}">Find</a>
                            <br /><br />
                            status:
                            <br />
                           <select name="Status" value="{{$employee->Status}}">
                            <option value="active">Active</option>
                            <option value="inactive">InActive</option>
                           </select>
                            <br />
                            <br />
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection