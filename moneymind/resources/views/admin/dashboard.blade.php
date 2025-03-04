@include('layouts.app')
@extends('admin.layouts.sidebar')

@section('content')
    <div style="height: auto; margin: 10px 0 200px 0; display: flex; flex-direction :column; gap: 20px">
        {{-- <div><h2>Welcome back admin: <b>{{ $infos->name}}</b></h2>
        </div> --}}

        <div style="width: 95%; height: 200px;  border-radius: 10px; align-self: center; display: flex; gap: 30px; padding: 10px 10px 10px 10px">
            <div style="position: relative; background-color: white; width: 350px; height: 150px; border-radius: 10px; padding: 5px 0 0 15px; display: flex; flex-direction: column; align-items: start; gap: 25px">
                <h3 style="font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 20px">{{'Total Users'}}</h3>
                <i class="fa-solid fa-users" style="position: absolute; top: 10%; left: 90%; color: gray"></i>
                <h5 style="font-family: 'Poppins', sans sarif; font-size: 15px; background-color: #eceaea; padding: 0px 10px; border-radius: 5px">{{'58.200'}}</h5>
                <p style="font-family: 'Poppins', sans sarif; font-size: 13px">+{{ '127' }} this month.</p>
            </div>

            <div style="position: relative; background-color: white; width: 350px; height: 150px; border-radius: 10px; padding: 5px 0 0 15px; display: flex; flex-direction: column; align-items: start; gap: 25px">
                <h3 style="font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 20px">{{'Total Active Users'}}</h3>
                <i class="fa-solid fa-person-arrow-up-from-line " style="position: absolute; top: 10%; left: 90%; color: gray"></i>
                <h5 style="font-family: 'Poppins', sans sarif; font-size: 15px; background-color: #eceaea; padding: 0px 10px; border-radius: 5px">{{'58.200'}}</h5>
                <p style="font-family: 'Poppins', sans sarif; font-size: 13px">+{{ '127' }} this month.</p>
            </div>

            <div style="position: relative; background-color: white; width: 350px; height: 150px; border-radius: 10px; padding: 5px 0 0 15px; display: flex; flex-direction: column; align-items: start; gap: 25px">
                <h3 style="font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 20px">{{'Total Inactive Users'}}</h3>
                <i class="fa-solid fa-person-arrow-down-to-line" style="position: absolute; top: 10%; left: 90%; color: gray"></i>
                <h5 style="font-family: 'Poppins', sans sarif; font-size: 15px; background-color: #eceaea; padding: 0px 10px; border-radius: 5px">{{'58.200'}}</h5>
                <p style="font-family: 'Poppins', sans sarif; font-size: 13px">+{{ '127' }} this month.</p>
            </div>

            <div style="position: relative; background-color: white; width: 350px; height: 150px; border-radius: 10px; padding: 5px 0 0 15px; display: flex; flex-direction: column; align-items: start; gap: 25px">
                <h3 style="font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 20px">{{'Average Income'}}</h3>
                <i class="fa-solid fa-percent" style="position: absolute; top: 10%; left: 90%; color: gray"></i>
                <h5 style="font-family: 'Poppins', sans sarif; font-size: 15px; background-color: #eceaea; padding: 0px 10px; border-radius: 5px">{{'58.200'}}</h5>
                <p style="font-family: 'Poppins', sans sarif; font-size: 13px">+{{ '127' }} this month.</p>
            </div>

        </div>
    </div>

    {{-- <div style="align-self: center; width: 90%; justify-content: center; align-items: start; height: 400px; border: #e4e4e4ab solid; border-radius: 10px; padding: 10px 10px 10px 20px;">
        <h2 style="font-weight: bold; font-size: 18px">Inactive Users</h2>
        <div style="display: flex; flex-direction: column; align-self: center; justify-content: center; align-items: start; height: 95%; overflow-y: scroll; gap: 20px">
            <table border="1" cellpadding="10" cellspacing="0" style="width: 100%;">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Last Active</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td style="font-size: 13px">2025-03-01</td>
                        <td style="display: flex; justify-content: center">
                            <p style="font-size: 13px; background-color: lightgray; padding: 3px 7px; border-radius: 5px">Inactive</p>
                        </td>
                        <td><button style="color: red; border: none; padding: 5px 10px; cursor: pointer;"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
@endsection
