@include('layouts.app')
@extends('layouts.sidebar')

@section('content')
<!-- content for the dashboard -->
<div class="bg-blue-100  rounded-lg">
    <img src="{{ asset("images/ai agent.png")}}" alt="ai agent image" style="width: 70px; height: 80px; position: relative; top: 10px; left: 90%">
    <div style="background-color: #1dbd1d75; border: #e4e4e4ab solid; padding: 10px; border-radius: 20px; font-family: 'Poppins'; font-size: 14px; font-weight: 600; color: #3a3a3a;">
        <p class="text-black-700">{{ $financialAdvice }}</p>
    </div>
</div>


<div style="display: flex; gap: 20px; overflow: hidden; margin-top: 20px">
    <div style="width: 70%; height: auto; display: flex; flex-direction: column; gap: 20px">
        <div style="height: auto; border: #e4e4e4ab solid; border-radius: 10px; padding: 20px;">
            <h2>Total expenses by Category</h2>
            <canvas id="categoryChart"></canvas>
        </div>


        <div style="height: auto; border: #e4e4e4ab solid; border-radius: 10px; padding: 20px; display: flex; justify-content: space-between;">
            <div>
                <h2>Overall Financial Summary</h2>
                <canvas id="summaryChart"></canvas>
            </div>
            <div class="stats" style="display: flex; justify-content: space-between; align-items: flex-start; margin-top: 60px; font-family: 'Poppins';">
                <div style="display: flex; flex-direction: column; gap: 30px">
                    <div>
                        <h3>Salary:</h3>
                        <p>{{$infos->salary}} dh</p>
                    </div>
                    <div>
                        <h3>Expenses:</h3>
                        <p>{{$totalExpenses}} dh</p>
                        <p>({{ number_format(($totalExpenses / $balance) * 100, 2) }}%)</p>
                    </div>
                    <div>
                        <h3>Monthly Expenses:</h3>
                        <p>{{$totalRecurringExpenses}} dh</p>
                        <p>({{ number_format(($totalRecurringExpenses / $balance) * 100, 2) }}%)</p>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 30px">
                    <div>
                        <h3>Current Balance:</h3>
                        <p>{{$restOfBalance}} dh ({{ number_format(($restOfBalance / $balance) * 100, 2) }}%)</p>
                    </div>
                    <div>
                        <h3>Saving Goal:</h3>
                        <p>{{$savingGoal}} dh</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 30%; height: auto; border: #e4e4e4ab solid; border-radius: 10px; display: flex; flex-direction: column; gap: 20px; align-items: center">
        <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px; align-self: flex-start; padding: 10px 0 0 15px ">Your info</h2>
        <div style="height: 200px; width: 95%; background: linear-gradient(to right, #aca2fe 80%, black 20%); border-radius: 10px; display: flex; flex-direction: column; gap: 5px; padding:10px 0 0 15px; border: 2px solid black; box-shadow: 5px 5px gray;">
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 15px">{{ $infos->name }}</h2>
            <h3 style="font-family: 'Poppins', sans-serif; font-size: 13px;">Balance: {{ $infos->balance}} dh</h3>
            <p style="position: relative; top: 40%; left: 82%; color: white; font-size: 15px">{{ \Carbon\Carbon::parse($infos->created_at)->format('dM') }}</p>
            <h2 style="margin-top: 50px; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px">MoneyMind</h2>
        </div>

        <div style="width: 100%; padding: 10px 10px 0 10px ">
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px; margin-bottom: 20px">Recent Expenses</h2>
            @foreach($expenses->take(6) as $expense)
            <div style="display: flex; gap: 20px; padding: 10px; justify-content: space-between">
                <div style="display: flex; flex-direction: column; gap: 5px; align-items: start; justify-content: center">
                    <div>
                        <h3>{{$expense->name}}</h3>
                    </div>
                    <div>
                        <p style="font-size: 12px">{{ \Carbon\Carbon::parse($expense->created_at)->format('dM  h:m') }}</p>
                    </div>
                </div>

                <div>
                    <p>-{{$expense->price}} dh</p>
                </div>
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



<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Laravel Data
            const balance = {!! json_encode($balance) !!};
            const savingGoal = {!! json_encode($savingGoal) !!};
            const totalExpenses = {!! json_encode($totalExpenses) !!};
            const totalRecurringExpenses = {!! json_encode($totalRecurringExpenses) !!};
            const totalAllExpenses = {!! json_encode($totalAllExpenses) !!};
            const restOfBalance = {!! json_encode($restOfBalance) !!};

            // Category Data
            const categoryLabels = {!! json_encode($categoryNames->values()) !!}; // Category Names
            const expenseData = {!! json_encode($expensesByCategory->values()) !!}; // Expenses
            const recurringExpenseData = {!! json_encode($recurringExpensesByCategory->values()) !!}; // Recurring Expenses

            // Summary Chart (pie)
            const ctx1 = document.getElementById('summaryChart').getContext('2d');
            new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: ['Current Balance', 'Total Expenses', 'Total Recurring Expenses', 'Saving Goal'],
                    datasets: [{
                        label: 'Financial Overview',
                        data: [restOfBalance, totalExpenses, totalRecurringExpenses, savingGoal],
                        backgroundColor: ['#0080006e', '#ffff006e', '#ff000082', '#8000806e'],
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { 
                        legend: { 
                            position: 'top',
                            labels: {
                                boxWidth: 20,
                                padding: 15,
                                textAlign: 'center',
                                usePointStyle: true
                            }
                        } 
                    }
                }
            });

            // Expenses by Category (bar)
            const ctx2 = document.getElementById('categoryChart').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: categoryLabels,
                    datasets: [{
                        label: 'Expenses by Category',
                        data: expenseData,
                        backgroundColor: ['#ff000063', '#0000ff63', '#9fed999e', '#ed99e09e', '#eded99bd'],
                        borderWidth: 1,
                        barThickness: 70
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {legend: {display: false,}
        }
                }
            });
        });
    </script>

    <style>
    #summaryChart {
        width: 300px;
        height: 100px;
        margin: 20px auto;
        display: flex;
    }

    #categoryChart {
        width: 600px;
        height: 400px;
        margin: 20px auto;
        display: flex;
    }

    .stats p{
        font-size: 14px;
        color: #5a5a5a;
    }
    </style>
