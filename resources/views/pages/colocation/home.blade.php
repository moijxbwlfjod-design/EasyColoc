@extends('pages.layouts.dashboard_layout')
@section('main')
<div class="container">
    <div class="rate__container">
        <h3>Your actual rate is:</h3>
        <p>{{ $user->rate }}</p>
    </div>

    <div class="expense__container">

    </div>

    <div class="colocation__container">

    </div>
</div>
@endsection