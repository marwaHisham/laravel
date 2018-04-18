@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Job</th>
                                    <th>Status</th>
                                    <th>Location</th>
                                    <th>Img</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($employee as $emp)
                                <tr>
                                    <td>{{ $emp->First_name }}</td>
                                    <td>{{ $emp->Last_name }}</td>
                                    <td>{{ $emp->Job }}</td>
                                    <td>{{ $emp->Status }}</td>
                                    <td>{{ $emp->Location }}</td>
                                    
                                     <td > <img  src={{Storage::url($emp->img)}}  width="20px" height="20px" ></td>
                                     <td><a href="{{action('EmployeeController@edit',$emp['id'])}}"  class="btn btn-warning">Edit</a></td>
                                        <td>
                                        <form action="{{action('EmployeeController@destroy', $emp['id'])}}"  method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                        </td>
                                </tr>
                                @empty
                                   
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection	