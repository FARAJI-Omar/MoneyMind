@include('layouts.app')
@extends('layouts.sidebar')

@section('content')
<!-- content for the dashboard -->
<div style="position: relative; overflow: hidden; background: linear-gradient(135deg, #f0f9ff 0%, #e1f5fe 100%); border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); margin-bottom: 10px;">
    <canvas id="dashboard-particles-canvas" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0;"></canvas>

    <div style="display: flex; align-items: flex-start; padding: 20px; position: relative; z-index: 1;">
        <div style="flex-grow: 1;">
            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                <div style="background-color: #1dbd1d; width: 40px; height: 40px; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-right: 15px; box-shadow: 0 4px 10px rgba(29, 189, 29, 0.3);">
                    <i class="fas fa-lightbulb" style="color: white; font-size: 18px;"></i>
                </div>
                <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #1e293b; margin: 0;">Financial Insight</h3>
            </div>

            <div style="background-color: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border-radius: 12px; padding: 16px; border-left: 4px solid #1dbd1d; font-family: 'Poppins'; font-size: 14px; line-height: 1.5; color: #334155; margin-left: 55px;">
                <p>{{ $financialAdvice }}</p>
                <br>
                <p style="font-size: 9px">powered by Gemini.AI</p>
            </div>
        </div>

        <img src="{{ asset("images/ai agent.png")}}" alt="AI assistant" style="width: 80px; height: 90px; margin-left: 20px; filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));">
    </div>
</div>


<div style="display: flex; gap: 20px; overflow: hidden; margin-top: 20px">
    <div style="width: 70%; height: auto; display: flex; flex-direction: column; gap: 20px">
        <div style="height: auto; background: white; border-radius: 16px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="background-color: #180e5b; width: 36px; height: 36px; border-radius: 10px; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                    <i class="fas fa-chart-bar" style="color: white; font-size: 16px;"></i>
                </div>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #1e293b; margin: 0;">Total Expenses by Category</h2>
            </div>
            <div style="background-color: #f8fafc; border-radius: 12px; padding: 20px;">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>


        <div style="height: auto; background: white; border-radius: 16px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="background-color: #00bbf0; width: 36px; height: 36px; border-radius: 10px; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                    <i class="fas fa-chart-pie" style="color: white; font-size: 16px;"></i>
                </div>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #1e293b; margin: 0;">Overall Financial Summary</h2>
            </div>

            <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                <div style="width: 45%; background-color: #f8fafc; border-radius: 12px; padding: 20px;">
                    <canvas id="summaryChart"></canvas>
                </div>

                <div class="stats" style="width: 50%; display: flex; justify-content: space-between; font-family: 'Poppins';">
                    <div style="display: flex; flex-direction: column; gap: 20px; width: 48%;">
                        <div style="background: rgba(0, 187, 240, 0.1); padding: 15px; border-radius: 12px;">
                            <h3 style="font-size: 14px; color: #64748b; margin: 0 0 8px 0;">Salary</h3>
                            <p style="font-size: 18px; font-weight: 600; color: #0284c7; margin: 0;">{{$infos->salary}} <span style="font-size: 14px; font-weight: 400;">dh</span></p>
                        </div>

                        <div style="background: rgba(239, 68, 68, 0.1); padding: 15px; border-radius: 12px;">
                            <h3 style="font-size: 14px; color: #64748b; margin: 0 0 8px 0;">Expenses</h3>
                            <p style="font-size: 18px; font-weight: 600; color: gold; margin: 0;">{{$totalExpenses}} <span style="font-size: 14px; font-weight: 400;">dh</span></p>
                            <p style="font-size: 13px; color: #64748b; margin: 5px 0 0 0;">{{ ($balance != 0) ? number_format(($totalExpenses / $balance) * 100, 2) : 'N/A' }}% of balance</p>
                        </div>

                        <div style="background: rgba(245, 158, 11, 0.1); padding: 15px; border-radius: 12px;">
                            <h3 style="font-size: 14px; color: #64748b; margin: 0 0 8px 0;">Monthly Expenses</h3>
                            <p style="font-size: 18px; font-weight: 600; color: #ef4444; margin: 0;">{{$totalRecurringExpenses}} <span style="font-size: 14px; font-weight: 400;">dh</span></p>
                            <p style="font-size: 13px; color: #64748b; margin: 5px 0 0 0;">{{ ($balance != 0) ? number_format(($totalRecurringExpenses / $balance) * 100, 2) : 'N/A' }}% of balance</p>
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 20px; width: 48%;">
                        <div style="background: rgba(16, 185, 129, 0.1); padding: 15px; border-radius: 12px;">
                            <h3 style="font-size: 14px; color: #64748b; margin: 0 0 8px 0;">Current Balance</h3>
                            <p style="font-size: 18px; font-weight: 600; color: #10b981; margin: 0;">{{$restOfBalance}} <span style="font-size: 14px; font-weight: 400;">dh</span></p>
                            <p style="font-size: 13px; color: #64748b; margin: 5px 0 0 0;">{{ ($balance != 0) ? number_format(($restOfBalance / $balance) * 100, 2) : 'N/A' }}% of total</p>
                        </div>

                        <div style="background: rgba(124, 58, 237, 0.1); padding: 15px; border-radius: 12px;">
                            <h3 style="font-size: 14px; color: #64748b; margin: 0 0 8px 0;">Saving Goal</h3>
                            <p style="font-size: 18px; font-weight: 600; color: #7c3aed; margin: 0;">{{$savingGoal}} <span style="font-size: 14px; font-weight: 400;">dh</span></p>
                        </div>

                        <div style="background: rgba(24, 14, 91, 0.1); padding: 15px; border-radius: 12px;">
                            <h3 style="font-size: 14px; color: #64748b; margin: 0 0 8px 0;">Progress to Goal</h3>
                            <div style="height: 8px; width: 100%; background: #e2e8f0; border-radius: 4px; margin-top: 10px; overflow: hidden;">
                                @php
                                    $progressPercentage = $savingGoal > 0 ? min(100, max(0, ($restOfBalance / $savingGoal) * 100)) : 0;
                                @endphp
                                <div style="height: 100%; width: {{ $progressPercentage }}%; background: #180e5b; border-radius: 4px;"></div>
                            </div>
                            <p style="font-size: 13px; color: #64748b; margin: 5px 0 0 0;">{{ number_format($progressPercentage, 1) }}% complete</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 30%; height: auto; display: flex; flex-direction: column; gap: 20px;">
        <div style="background: white; border-radius: 16px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="background-color: #180e5b; width: 36px; height: 36px; border-radius: 10px; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                    <i class="fas fa-user" style="color: white; font-size: 16px;"></i>
                </div>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #1e293b; margin: 0;">Your Profile</h2>
            </div>

            <div style="background: linear-gradient(135deg, #180e5b 0%, #00bbf0 100%); border-radius: 16px; padding: 20px; color: white; position: relative; overflow: hidden; margin-bottom: 15px;">
                <div style="position: absolute; top: 0; right: 0; width: 120px; height: 120px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; transform: translate(30%, -30%);"></div>
                <div style="position: absolute; bottom: 0; left: 0; width: 80px; height: 80px; background: rgba(255, 255, 255, 0.1); border-radius: 50%; transform: translate(-30%, 30%);"></div>

                <div style="position: relative; z-index: 1;">
                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                        <div style="width: 50px; height: 50px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                            <i class="fa-solid fa-user" style="font-size: 30px"></i>
                        </div>
                        <div>
                            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; margin: 0;">{{ $infos->name }}</h3>
                            <p style="font-family: 'Poppins', sans-serif; font-size: 12px; margin: 5px 0 0 0; opacity: 0.8;">Member since {{ \Carbon\Carbon::parse($infos->created_at)->format('M Y') }}</p>
                        </div>
                    </div>

                    <div style="background: rgba(255, 255, 255, 0.1); border-radius: 12px; padding: 15px; margin-bottom: 15px;">
                        <p style="font-family: 'Poppins', sans-serif; font-size: 13px; margin: 0 0 5px 0; opacity: 0.8;">Total Balance</p>
                        <h4 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 24px; margin: 0;">{{ $balance}} <span style="font-size: 14px; font-weight: 400;">dh</span></h4>
                    </div>

                    <div style="text-align: right; font-family: 'Poppins', sans-serif; font-weight: 700; font-size: 16px; opacity: 0.9;">
                        MoneyMind
                    </div>
                </div>
            </div>
        </div>

        <div style="background: white; border-radius: 16px; padding: 25px; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
            <div style="display: flex; align-items: center; margin-bottom: 15px;">
                <div style="background-color: #ef4444; width: 36px; height: 36px; border-radius: 10px; display: flex; justify-content: center; align-items: center; margin-right: 15px;">
                    <i class="fas fa-receipt" style="color: white; font-size: 16px;"></i>
                </div>
                <h2 style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 18px; color: #1e293b; margin: 0;">Recent Expenses</h2>
            </div>
            @foreach($expenses->take(6) as $expense)
            <div class="expense-item" style="display: flex; gap: 20px; justify-content: space-between; margin-bottom: 5px;">
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
            <div style="display: flex; justify-content: center; margin-top: 15px;">
                <a href="{{ route('expenses')}}" style="display: inline-block; font-family: 'Poppins', sans-serif; font-weight: 500; font-size: 14px; color: white; background-color: #180e5b; padding: 8px 16px; border-radius: 8px; text-decoration: none; transition: all 0.2s ease;" onmouseover="this.style.backgroundColor='#2d1f8e'" onmouseout="this.style.backgroundColor='#180e5b'">
                    <i class="fas fa-eye" style="margin-right: 8px;"></i> View All Expenses
                </a>
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
            const expenseData = {!! json_encode($categoryExpenses->values()) !!}; // Expenses
            const recurringExpenseData = {!! json_encode(array_values($recurringExpensesByCategory)) !!}; // Recurring Expenses

            // Summary Chart (pie)
            const ctx1 = document.getElementById('summaryChart').getContext('2d');
            new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: ['Current Balance', 'Total Expenses', 'Total Monthly Expenses', 'Saving Goal'],
                    datasets: [{
                        label: 'Financial Overview',
                        data: [restOfBalance, totalExpenses, totalRecurringExpenses, savingGoal],
                        backgroundColor: ['#10b981', '#f59e0b', '#ef4444', '#7c3aed'],
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
                        backgroundColor: ['#ef4444', '#00bbf0', '#10b981', '#7c3aed', '#f59e0b'],
                        borderWidth: 1,
                        barThickness: 70
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {legend: {display: false}}
                }
            });
        });
    </script>

<script src="{{ asset('js/dashboard-particles.js') }}"></script>

    <style>
    #summaryChart {
        width: 100%;
        height: 250px;
        margin: 0 auto;
        display: flex;
    }

    #categoryChart {
        width: 100%;
        height: 300px;
        margin: 0 auto;
        display: flex;
    }

    /* Expense item styling */
    .expense-item {
        padding: 12px;
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    .expense-item:hover {
        background-color: #f8fafc;
    }

    /* Responsive adjustments */
    @media (max-width: 1200px) {
        #summaryChart {
            height: 200px;
        }

        #categoryChart {
            height: 250px;
        }
    }
    </style>










