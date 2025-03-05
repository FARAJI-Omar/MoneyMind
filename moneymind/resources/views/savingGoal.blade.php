@include('layouts.app')
@extends('layouts.sidebar')

@section('content')


<div>
@if(session('success'))
<div id="alert" style="width: 400px; height: 45px; background-color: white; color: green; border: green 2px solid; border-radius: 5px; display: flex; font-family: 'Poppins'; font-weight: bold;">
    <div style="background-color: green; width: 15%; display: flex; justify-content: center; align-items: center">
        <i class="fa-solid fa-circle-check" style="color: white; font-weight: bold; font-size: 30px"></i>
    </div>
    <div style="align-self: center; padding-left: 10px; font-size: 14px">
        {{ session('success') }}
    </div>
</div>
@endif
    @if (!$savingGoal)
    <div>
        <button id="toggleFormBtn" class="btn btn-primary" style="background-color: lightgray; border: 2px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; font-weight: 600; font-family: 'Poppins', sans-serif; width: 100%; height: 50px; margin-bottom: 30px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.04)'" onmouseout="this.style.transform='scale(1)'">
            <i class="fa-solid fa-pen-to-square"></i> Create Saving Goal
        </button>
    </div>
    @endif

    {{-- form --}}
    <div id="form" style="display: none; flex-direction: column; gap: 20px; align-items: center; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 5px 5px gray; width: 60%; margin: 0 auto 40px auto">
        <form action="{{ route('savingGoal.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <h2>Saving Goal</h2>
            </div>

            <div class="mb-4">
                <label for="target_amount" class="block font-medium">Target Amount (dh)</label>
                <input type="number" name="target_amount" id="target_amount" class="w-full p-2 border rounded" required>
            </div>

            <div style="display: flex; font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 20%; gap:20px">
                <button type="button" id="cancel" Style="background-color: gray; border: 1px solid gray; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">Cancel</button>
                <button type="submit" Style="background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        Save
                </button>
            </div>
        </form>
    </div>
    <div style="margin-top: 5%; height: 30%; border: #e4e4e4ab solid; border-radius: 10px; padding: 0 10px 0 10px; display: flex; flex-direction: column; gap: 30px; justify-content: center; align-items: center;">
    <h2 style="margin: 0 0 15px 10px; font-family: 'Poppins', sans sarif; font-weight: 600; font-size: 22px">Saving Goal</h2>
    @if ($savingGoal)
    <form action="{{ route('savingGoal.update', ['id' => $savingGoal->id]) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="credit_day" class="block font-medium">Target Amount (dh)</label>
                <input type="number" name="target_amount" id="target_amount" value="{{ old('target_amount', $savingGoal->target_amount) }}" class="w-full p-2 border rounded" required>
            </div>

            <div style="display: flex; justify-content: center; font-weight: 600; font-family: 'Poppins', sans-serif; color: white; margin-top: 20%;">
                <button type="submit" Style="background-color: #9688d9; border: 1px solid #9688d9; box-shadow: 5px 5px black; border-radius: 5px; padding: 5px 10px; transition: transform 0.15s ease-in-out" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    Save Changes
                </button>
            </div>
    </form>
    @else
        <p>No saving goal found.</p>
    @endif
   
</div>
</div>
@endsection



<script>
    // JavaScript to hide the form by default and toggle visibility
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('form');
        const toggleButton = document.getElementById('toggleFormBtn');
        const cancelButton = document.getElementById('cancel');

        // Hide the form by default
        form.style.display = 'none';

        cancelButton.addEventListener('click', function() {
            form.style.display = 'none';
        });

        // Toggle form visibility when the button is clicked
        toggleButton.addEventListener('click', function() {
            if (form.style.display === 'none') {
                form.style.display = 'flex';
            } else {
                form.style.display = 'none';
            }
        });
    });




     setTimeout(function() {
        const alert = document.getElementById('alert');
        if (alert){
                alert.style.display = 'none';
            }
        }, 3000); // 3000ms = 3 sec

</script>