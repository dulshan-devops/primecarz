<div class="section-filter">
    <div class="b-filter__inner bg-grey container">
        <h2>Find your right car</h2>
        <form class="b-filter" method="get" action="{{ route('filter-vehicles') }}">
            @csrf
            <div class="btn-group bootstrap-select">
                <select class="selectpicker" data-width="100%" tabindex="-98" name="brand" id="brand"
                    >
                    <option value="">Select Make</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->brand }}">{{ $brand->brand }}</option>
                    @endforeach
                </select>
            </div>
            <div class="btn-group bootstrap-select">
                <select class="selectpicker" data-width="100%" tabindex="-98" name="model" id="model"
                    >
                    <option value="">Select Model</option>
                    {{-- @foreach ($models as $model)
                        <option value="{{ $model->model }}">{{ $model->model }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="btn-group bootstrap-select">
                <select class="selectpicker" data-width="100%" tabindex="-98" name="min_price">
                    <option value="">Min Price</option>
                    <option value="500">£500.00</option>
                    <option value="1000">£1,000.00</option>
                    <option value="2000">£2,000.00</option>
                    <option value="3000">£3,000.00</option>
                    <option value="4000">£4,000.00</option>
                    <option value="5000">£5,000.00</option>
                    <option value="6000">£6,000.00</option>
                    <option value="7000">£7,000.00</option>
                    <option value="8000">£8,000.00</option>
                    <option value="9000">£9,000.00</option>
                    <option value="10000">£10,000.00</option>
                    <option value="11000">£11,000.00</option>
                    <option value="12000">£12,000.00</option>
                    <option value="13000">£13,000.00</option>
                    <option value="14000">£14,000.00</option>
                    <option value="15000">£15,000.00</option>
                    <option value="16000">£16,000.00</option>
                    <option value="17000">£17,000.00</option>
                    <option value="18000">£18,000.00</option>
                    <option value="19000">£19,000.00</option>
                    <option value="20000">£20,000.00</option>
                    <option value="22500">£22,500.00</option>
                    <option value="25000">£25,000.00</option>
                    <option value="27500">£27,500.00</option>
                    <option value="30000">£30,000.00</option>
                    <option value="35000">£35,000.00</option>
                    <option value="40000">£40,000.00</option>
                    <option value="50000">£50,000.00</option>
                    <option value="75000">£75,000.00</option>
                    <option value="100000">£100,000.00</option>
                    <option value="500000">£500,000.00</option>
                </select>
            </div>
            <div class="btn-group bootstrap-select">
                <select class="selectpicker" data-width="100%" tabindex="-98" name="max_price">
                    <option value="">Max Prices</option>
                    <option value="500">£500.00</option>
                    <option value="1000">£1,000.00</option>
                    <option value="2000">£2,000.00</option>
                    <option value="3000">£3,000.00</option>
                    <option value="4000">£4,000.00</option>
                    <option value="5000">£5,000.00</option>
                    <option value="6000">£6,000.00</option>
                    <option value="7000">£7,000.00</option>
                    <option value="8000">£8,000.00</option>
                    <option value="9000">£9,000.00</option>
                    <option value="10000">£10,000.00</option>
                    <option value="11000">£11,000.00</option>
                    <option value="12000">£12,000.00</option>
                    <option value="13000">£13,000.00</option>
                    <option value="14000">£14,000.00</option>
                    <option value="15000">£15,000.00</option>
                    <option value="16000">£16,000.00</option>
                    <option value="17000">£17,000.00</option>
                    <option value="18000">£18,000.00</option>
                    <option value="19000">£19,000.00</option>
                    <option value="20000">£20,000.00</option>
                    <option value="22500">£22,500.00</option>
                    <option value="25000">£25,000.00</option>
                    <option value="27500">£27,500.00</option>
                    <option value="30000">£30,000.00</option>
                    <option value="35000">£35,000.00</option>
                    <option value="40000">£40,000.00</option>
                    <option value="50000">£50,000.00</option>
                    <option value="75000">£75,000.00</option>
                    <option value="100000">£100,000.00</option>
                    <option value="500000">£500,000.00</option>
                    <option value="1000000">£1,000,000.00</option>
                </select>
            </div>
            <div class="btn-group bootstrap-select">
                <select class="selectpicker" data-width="100%" tabindex="-98" name="transmission">
                    <option value="">Transmission</option>
                    <option value="0">Manual</option>
                    <option value="1">Automatic</option>
                    <option value="2">Semi Auto</option>
                </select>
            </div>
            <div class="btn-group bootstrap-select">
                <select class="selectpicker" data-width="100%" tabindex="-98" name="fuel_type">
                    <option value="">Fuel Type</option>
                    <option value="0">Hybrid</option>
                    <option value="1">Petrol</option>
                    <option value="2">Desel</option>
                    <option value="3">Electric</option>
                    <option value="4">Bi-Fuel</option>
                    <option value="5">LPG</option>
                </select>
            </div>
            <div>
                <div class="b-filter__btns">
                    <button class="btn btn-lg btn-primary" type="submit" style="position: relative;">Search
                        Vehicle</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
