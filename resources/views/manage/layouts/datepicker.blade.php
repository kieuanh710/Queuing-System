@extends('manage.dashboard-item.dashboard')
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

{{-- <div class="card bg-gradient-success">
                        <div class="card-body pt-0">

                            <div id="calendar" style="width: 100%">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days" style="">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Month"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Month">September 2022</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Month"></span></th>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th class="dow">Su</th>
                                                                <th class="dow">Mo</th>
                                                                <th class="dow">Tu</th>
                                                                <th class="dow">We</th>
                                                                <th class="dow">Th</th>
                                                                <th class="dow">Fr</th>
                                                                <th class="dow">Sa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="08/28/2022"
                                                                    class="day old weekend">28</td>
                                                                <td data-action="selectDay" data-day="08/29/2022"
                                                                    class="day old">29</td>
                                                                <td data-action="selectDay" data-day="08/30/2022"
                                                                    class="day old">30</td>
                                                                <td data-action="selectDay" data-day="08/31/2022"
                                                                    class="day old">31</td>
                                                                <td data-action="selectDay" data-day="09/01/2022"
                                                                    class="day">1</td>
                                                                <td data-action="selectDay" data-day="09/02/2022"
                                                                    class="day">2</td>
                                                                <td data-action="selectDay" data-day="09/03/2022"
                                                                    class="day weekend">3</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="09/04/2022"
                                                                    class="day weekend">4</td>
                                                                <td data-action="selectDay" data-day="09/05/2022"
                                                                    class="day">5</td>
                                                                <td data-action="selectDay" data-day="09/06/2022"
                                                                    class="day">6</td>
                                                                <td data-action="selectDay" data-day="09/07/2022"
                                                                    class="day">7</td>
                                                                <td data-action="selectDay" data-day="09/08/2022"
                                                                    class="day">8</td>
                                                                <td data-action="selectDay" data-day="09/09/2022"
                                                                    class="day">9</td>
                                                                <td data-action="selectDay" data-day="09/10/2022"
                                                                    class="day weekend">10</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="09/11/2022"
                                                                    class="day weekend">11</td>
                                                                <td data-action="selectDay" data-day="09/12/2022"
                                                                    class="day">12</td>
                                                                <td data-action="selectDay" data-day="09/13/2022"
                                                                    class="day">13</td>
                                                                <td data-action="selectDay" data-day="09/14/2022"
                                                                    class="day">14</td>
                                                                <td data-action="selectDay" data-day="09/15/2022"
                                                                    class="day active today">15</td>
                                                                <td data-action="selectDay" data-day="09/16/2022"
                                                                    class="day">16</td>
                                                                <td data-action="selectDay" data-day="09/17/2022"
                                                                    class="day weekend">17</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="09/18/2022"
                                                                    class="day weekend">18</td>
                                                                <td data-action="selectDay" data-day="09/19/2022"
                                                                    class="day">19</td>
                                                                <td data-action="selectDay" data-day="09/20/2022"
                                                                    class="day">20</td>
                                                                <td data-action="selectDay" data-day="09/21/2022"
                                                                    class="day">21</td>
                                                                <td data-action="selectDay" data-day="09/22/2022"
                                                                    class="day">22</td>
                                                                <td data-action="selectDay" data-day="09/23/2022"
                                                                    class="day">23</td>
                                                                <td data-action="selectDay" data-day="09/24/2022"
                                                                    class="day weekend">24</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="09/25/2022"
                                                                    class="day weekend">25</td>
                                                                <td data-action="selectDay" data-day="09/26/2022"
                                                                    class="day">26</td>
                                                                <td data-action="selectDay" data-day="09/27/2022"
                                                                    class="day">27</td>
                                                                <td data-action="selectDay" data-day="09/28/2022"
                                                                    class="day">28</td>
                                                                <td data-action="selectDay" data-day="09/29/2022"
                                                                    class="day">29</td>
                                                                <td data-action="selectDay" data-day="09/30/2022"
                                                                    class="day">30</td>
                                                                <td data-action="selectDay" data-day="10/01/2022"
                                                                    class="day new weekend">1</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="10/02/2022"
                                                                    class="day new weekend">2</td>
                                                                <td data-action="selectDay" data-day="10/03/2022"
                                                                    class="day new">3</td>
                                                                <td data-action="selectDay" data-day="10/04/2022"
                                                                    class="day new">4</td>
                                                                <td data-action="selectDay" data-day="10/05/2022"
                                                                    class="day new">5</td>
                                                                <td data-action="selectDay" data-day="10/06/2022"
                                                                    class="day new">6</td>
                                                                <td data-action="selectDay" data-day="10/07/2022"
                                                                    class="day new">7</td>
                                                                <td data-action="selectDay" data-day="10/08/2022"
                                                                    class="day new weekend">8</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-months" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Year"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Year">2022</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Year"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectMonth"
                                                                        class="month">Jan</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Feb</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Mar</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Apr</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">May</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jun</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Jul</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Aug</span><span
                                                                        data-action="selectMonth"
                                                                        class="month active">Sep</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Oct</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Nov</span><span
                                                                        data-action="selectMonth"
                                                                        class="month">Dec</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-years" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Decade"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5" title="Select Decade">2020-2029</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Decade"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectYear"
                                                                        class="year old">2019</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2020</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2021</span><span
                                                                        data-action="selectYear"
                                                                        class="year active">2022</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2023</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2024</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2025</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2026</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2027</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2028</span><span
                                                                        data-action="selectYear"
                                                                        class="year">2029</span><span
                                                                        data-action="selectYear"
                                                                        class="year old">2030</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-decades" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span
                                                                        class="fa fa-chevron-left"
                                                                        title="Previous Century"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch"
                                                                    colspan="5">2000-2090</th>
                                                                <th class="next" data-action="next"><span
                                                                        class="fa fa-chevron-right"
                                                                        title="Next Century"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectDecade"
                                                                        class="decade old"
                                                                        data-selection="2006">1990</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2006">2000</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2016">2010</span><span
                                                                        data-action="selectDecade" class="decade active"
                                                                        data-selection="2026">2020</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2036">2030</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2046">2040</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2056">2050</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2066">2060</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2076">2070</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2086">2080</span><span
                                                                        data-action="selectDecade" class="decade"
                                                                        data-selection="2096">2090</span><span
                                                                        data-action="selectDecade" class="decade old"
                                                                        data-selection="2106">2100</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="picker-switch accordion-toggle"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div> --}}