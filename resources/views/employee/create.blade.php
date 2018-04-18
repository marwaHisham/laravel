@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Employee</div>

                    <div class="panel-body">
                        <form action="{{action('EmployeeController@store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            First name:
                            <br />
                            <input type="text" name="first_name" value="{{ old('first_name') }}" />
                            <br /><br />
                            Last name:
                            <br/>
                             <input type="text" name="last_name" />
                            <br />
                             Email:
                            <br />
                            <input type="text" name="email"  />
                            <br /><br />
                            Password:
                            <br />
                            <input type="text" name="password" />
                            <br />
                            Job:
                            <br />
                            <input type="text" name="job" />
                            <br /><br />
                             Img
                            <br />
                            <input type="file" name="img"/>
                            <br />
                            Location:
                            <br />

                            <input type="text" name="location" value="{{$loc}}"  />
                             <a href="/map?page=create">Find</a>
                            <br /><br />
                            status:
                            <br />
                           <select name="Status">
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