@extends('manage.layouts.main')
@section('heading')
{{ Breadcrumbs::render('home') }}
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 title">Biểu đồ cấp số</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-3 col-6">
    
                    <div class="small-box">
                        <div class="inner">
                            <i class="fas fa-regular fa-calendar"></i>
                            <p>hgfffffh</p>
                        </div>
                        <div class="icon">
                            <span>asa</span>   
                            <span>asa</span>   
                        </div>
                        
                    </div>
                </div>
    
                <div class="col-lg-3 col-6">
    
                    <div class="small-box">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>
                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
    
                <div class="col-lg-3 col-6">
    
                    <div class="small-box">
                        <div class="inner">
                            <h3>44</h3>
                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
    
                <div class="col-lg-3 col-6">
    
                    <div class="small-box">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            
        </div>

    </div>

</div>
@endsection