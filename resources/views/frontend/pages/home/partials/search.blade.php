<div class="row margin-leftright-null search-section section-padding">
    <div class="col-md-9 margin-leftright-null" style="top: 15px;">
            <div class="form-group has-search margin-leftright-null main">
{{--                {{dd(isset($district_list->districts))}}--}}

                {!! Form::open( ['route' => ['frontend.tele-medicine.speciality-wise-doctor'], 'method' => 'GET','class' =>'form-inline tele-medicine-doctor-search-form']) !!}
                    <span class="fa fa-map-marker form-control-feadback"></span>
{{--                    <input type="text" id="location" placeholder="Dhaka" name="email">--}}
                    <select id="location" class="form-control"  data-error="Please Select district" name="district_id">
                        <option value="">{{__('home.search.dhaka')}}</option>
                        @if(isset($district_list->districts))
                            @foreach($district_list->districts as $district)
                                <option value="{!! $district->district_name !!}">{!! $district->district_name !!}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="fa fa-search search-icon form-control-feadback"></span>

                    <select id="speciality" class="form-control"  name="speciality_id" required>
                        <option value="">{{__('home.search.search_specialists')}}</option>
                        @if(isset($speciality_list->specialities))
                            @foreach($speciality_list->specialities as $speciality)
                            <option value="{!! $speciality->id !!}">{!! $speciality->name !!}</option>
                            @endforeach
                        @endif
                    </select>
                    <div>
                        <button class="btn btn-lg home-search-btn"> {{__('home.search.btn')}} </button>
                    </div>
                {!! Form::close() !!}
            </div>
    </div>

</div>