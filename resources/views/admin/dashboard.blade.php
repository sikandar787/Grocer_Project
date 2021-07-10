@extends('admin.app')
@section('title','Dashboard')
@section('header_title','Dashboard')
@section('maincontent')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $products }}</h3>

                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ url('view-products') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>
                            {{ $categories }}
                            <!-- <sup style="font-size: 20px">%</sup> -->
                        </h3>

                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ url('view-categories') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">


                <!-- small box -->
             <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            {{ $cities }}
                            <!-- <sup style="font-size: 20px">%</sup> -->
                        </h3>

                        <p>Cities</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-map"></i>
                    </div>
                    <a href="{{ url('view-cities') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>
                            {{ $areas }}
                        </h3>

                        <p>Areas</p>
                    </div>
                    <div class="icon">
                        <i class="ion-ios-photos"></i>
                    </div>
                    <a href="{{ url('view-areas') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-2">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $shops }}</h3>

                        <p>Shops</p>
                    </div>
                    <div class="icon">
                        <i class="ion-android-cart"></i>
                    </div>
                    <a href="view-shops" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>



                {{-- small Box --}}



            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $banners }}</h3>

                        <p>Banners</p>
                    </div>
                    <div class="icon">
                        <i class="ion-laptop"></i>
                    </div>
                    <a href="{{ url('view-banners') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
