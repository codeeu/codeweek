@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            School Creation page

            <section class="padd-top-0">
                <div class="container">
                    <div class="col-md-6 col-sm-6">
                        <form method="post" id="school" role="form" class="form-horizontal clearfix"
                              action="{{route('school.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>@lang('school.name'):</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}"/>
                                @component('components.validation-errors', ['field'=>'name'])
                                @endcomponent
                            </div>

                            <div class="form-group">
                                <label>@lang('school.location'):</label>
                                <input type="text" class="form-control" placeholder="Location" name="location" value="{{old('location')}}"/>
                                @component('components.validation-errors', ['field'=>'location'])
                                @endcomponent
                            </div>
                            <div class="form-group">
                                <label>@lang('school.description'):</label>
                                <textarea class="form-control height-120" placeholder="Description" name="description">{{old('description')}}</textarea>
                                @component('components.validation-errors', ['field'=>'description'])
                                @endcomponent
                            </div>
                            <div class="form-group">
                                <button class="btn theme-btn">@lang('school.add')</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div id="map_full_width_one" class="full-width" style="height:400px;"></div>
                    </div>
                </div>
            </section>
        </div>
    </section>

@endsection