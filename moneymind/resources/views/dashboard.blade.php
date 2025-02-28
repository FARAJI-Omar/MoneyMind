@include('layouts.app')
@extends('layouts.sidebar')

@section('content')
<!-- content for the dashboard -->
<div style="display: flex; gap: 20px; overflow: hidden">
    <div style="width: 70%; height: 100vh; display: flex; flex-direction: column; gap: 20px">
        <div style=" height: 80%; border: #e4e4e4ab solid; border-radius: 10px">

        </div>
        <div style=" height: 40%; border: #e4e4e4ab solid; border-radius: 10px">

        </div>
    </div>
    <div style="width: 30%; height: 100vh; border: #e4e4e4ab solid; border-radius: 10px; display: flex; flex-direction: column; gap: 20px; align-items: center">
        <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px; align-self: flex-start; padding: 10px 0 0 15px ">Your info</h2>
        <div style="height: 200px; width: 95%; background: linear-gradient(to right, #aca2fe 80%, black 20%); border-radius: 10px; display: flex; flex-direction: column; gap: 5px; padding:10px 0 0 15px; border: 2px solid black; box-shadow: 5px 5px gray;">
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 15px">{{ $infos->name }}</h2>
            <h3 style="font-family: 'Poppins', sans-serif; font-size: 12px">{{ $infos->email }}</h3>
            <p style="position: relative; top: 40%; left: 82%; color: white; font-size: 15px">{{ \Carbon\Carbon::parse($infos->created_at)->format('dM') }}</p>
            <h2 style="margin-top: 50px; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px">MoneyMind</h2>
        </div>

        <div>
        <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px; margin-bottom: 20px">Recent Payments</h2>
        <div style="display: flex; width: 100%; gap: 160px; padding: 10px;">
            <div style="display: flex; flex-direction: column; gap: 5px">
                <div><h3>Pet food</h3></div>
                <div><p>25/06 14:45</p></div>
            </div>
            <div><p>-150 dh</p></div>
        </div>
        <hr>
        <div style="display: flex; width: 100%; gap: 160px; padding: 10px;">
            <div style="display: flex; flex-direction: column; gap: 5px">
                <div><h3>Transport</h3></div>
                <div><p>25/06 14:59</p></div>
            </div>
            <div><p>-15 dh</div>
        </div>
        <hr>
        </div>
    </div>
</div>
@endsection
