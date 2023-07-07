<div class="row">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$countVehicles}}</h3>
                <p>Vehicles</p>
            </div>
            <div class="icon">
                <i class="fas fa-car-side"></i>
            </div>
            <a href="{{ route('dashboard.vehicles') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$countBrands}}</h3>
                <p>Makes</p>
            </div>
            <div class="icon">
                <i class="fas fa-list"></i>
            </div>
            <a href="{{ route('dashboard.brands') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$countSubs}}</h3>
                <p>Subscribers</p>
            </div>
            <div class="icon">
                <i class="fas fa-mail-bulk"></i>
            </div>
            <a href="{{route('dashboard.subscribers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$countPartEx}}</h3>
                <p>Part Exchanges</p>
            </div>
            <div class="icon">
                <i class="fas fa-sync"></i>
            </div>
            <a href="{{ route('dashboard.part-exchanges') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
