@include('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div style="padding-bottom: 3rem;">
    <div style="max-width: 80rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem; display: flex; flex-direction: column; gap: 1.5rem;">
        <div style="padding: 1rem; background-color: white; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1), 0px 1px 2px rgba(0, 0, 0, 0.06); border-radius: 0.5rem;">
            <div style="max-width: 36rem;">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div style="padding: 1rem; background-color: white; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1), 0px 1px 2px rgba(0, 0, 0, 0.06); border-radius: 0.5rem;">
            <div style="max-width: 36rem;">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div style="padding: 1rem; background-color: white; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1), 0px 1px 2px rgba(0, 0, 0, 0.06); border-radius: 0.5rem;">
            <div style="max-width: 36rem;">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>





@endsection
