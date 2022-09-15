@extends('manage.dashboard')
@section('datepicker')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Calendar #01</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="calendar calendar-first" id="calendar_first">
                <div class="calendar_header">
                    <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                     <h2></h2>
                    <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="calendar_weekdays"></div>
                <div class="calendar_content"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection