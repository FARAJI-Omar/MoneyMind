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

        <div style="width: 100%; padding: 10px 10px 0 10px ">
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px; margin-bottom: 20px">Recent Expenses</h2>
            @foreach($expenses->take(5) as $expense)
            <div style="display: flex; gap: 20px; padding: 10px; justify-content: space-between">
                <div style="display: flex; flex-direction: column; gap: 5px; align-items: start; justify-content: center">
                    <div><h3>{{$expense->name}}</h3></div>
                    <div><p style="font-size: 12px">{{ \Carbon\Carbon::parse($expense->created_at)->format('dM  h:m') }}</p></div>
                </div>
                
                <div><p>-{{$expense->price}} dh</p></div>
            </div>
            <hr>
            @endforeach
            <p style="margin: 0 0 0 10px">...</p>
            <div style="margin: 0 0 10px 120px">
                <a href="{{ route('expenses')}}" style="font-weight: bold; background-color: #aca2fe; padding: 2px 10px; border-radius: 5px;">See All</a>
            </div>
        </div>
    </div>
</div>
@endsection
