@include('layouts.app')
@extends('layouts.sidebar')

@section('content')
<!-- content for the dashboard -->
<div style="display: flex; gap: 20px; overflow: hidden">
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
                        <h3>🔹Salary:</h3>
                        <p>{{$salary}} dh (100%)</p>
                    </div>
                    <div>
                        <h3>🔸Total Expenses:</h3>
                        <p>{{$totalExpenses}} dh ({{ number_format(($totalExpenses / $salary) * 100, 2) }}%)</p>
                    </div>
                    <div>
                        <h3>🔸Total Recurring Expenses:</h3>
                        <p>{{$totalRecurringExpenses}} dh ({{ number_format(($totalRecurringExpenses / $salary) * 100, 2) }}%)</p>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 30px">
                    <div>
                        <h3>🔹Rest of Salary:</h3>
                        <p>{{$restOfSalary}} dh ({{ number_format(($restOfSalary / $salary) * 100, 2) }}%)</p>
                    </div>
                    <div>
                        <h3>🔸Saving Goal:</h3>
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
            <h3 style="font-family: 'Poppins', sans-serif; font-size: 12px">{{ $infos->email }}</h3>
            <p style="position: relative; top: 40%; left: 82%; color: white; font-size: 15px">{{ \Carbon\Carbon::parse($infos->created_at)->format('dM') }}</p>
            <h2 style="margin-top: 50px; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px">MoneyMind</h2>
        </div>

        <div style="width: 100%; padding: 10px 10px 0 10px ">
            <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 20px; margin-bottom: 20px">Recent Expenses</h2>
            @foreach($expenses->take(9) as $expense)
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
            const salary = {!! json_encode($salary) !!};
            const savingGoal = {!! json_encode($savingGoal) !!};
            const totalExpenses = {!! json_encode($totalExpenses) !!};
            const totalRecurringExpenses = {!! json_encode($totalRecurringExpenses) !!};
            const totalAllExpenses = {!! json_encode($totalAllExpenses) !!};
            const restOfSalary = {!! json_encode($restOfSalary) !!};

            // Category Data
            const categoryLabels = {!! json_encode($categoryNames->values()) !!}; // Category Names
            const expenseData = {!! json_encode($expensesByCategory->values()) !!}; // Expenses
            const recurringExpenseData = {!! json_encode($recurringExpensesByCategory->values()) !!}; // Recurring Expenses

            // 💰 Summary Chart (pie)
            const ctx1 = document.getElementById('summaryChart').getContext('2d');
            new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: ['Rest of Salary', 'Total Expenses', 'Total Recurring Expenses', 'Saving Goal'],
                    datasets: [{
                        label: 'Financial Overview',
                        data: [restOfSalary, totalExpenses, totalRecurringExpenses, savingGoal],
                        backgroundColor: ['green', 'blue', 'red', 'purple'],
                        borderWidth: 1,
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'top' } },
                }
            });

            // 📊 Expenses by Category (bar)
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
