@extends('layout.base')

@section('content')
    <section>

        <div class="container">



            <div class="clearfix">
                <h1 class="pull-left">@lang('resources.suggest.main_title')</h1>

            </div>
            <p class="aluminum">@lang('resources.suggest.required')</p>



            <form enctype="multipart/form-data" method="post" id="event" role="form" class="form-horizontal clearfix"
                  action="/resources/suggest">
                {{csrf_field()}}
                <div class="clearfix">
                    <div class="col-md-6 first">


                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label for="id_title" class="col-sm-3 control-label">* @lang('resources.suggest.name.label')</label>

                            <div class="col-sm-9">
                                <input class="form-control" id="id_name" maxlength="255" name="name"
                                       placeholder="@lang('resources.suggest.name.placeholder')" type="text"
                                       value="{{old('name')}}">
                            </div>
                            @component('components.validation-errors', ['field'=>'name'])
                            @endcomponent


                        </div>


                        <div class="form-group @if($errors->has('source')) has-error @endif">
                            <label for="id_source" class="col-sm-3 control-label">* @lang('resources.suggest.source.label')</label>

                            <div class="col-sm-9">
                                <input class="form-control" id="id_source" maxlength="255" name="source"
                                       placeholder="@lang('resources.suggest.source.placeholder')" type="text"
                                       value="{{old('source')}}">
                            </div>
                            @component('components.validation-errors', ['field'=>'source'])
                            @endcomponent


                        </div>

                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label for="id_description" class="col-sm-3 control-label">* @lang('resources.suggest.description.label')</label>

                            <div class="col-sm-9">
                                <input class="form-control" id="id_description" maxlength="255" name="description"
                                       placeholder="@lang('resources.suggest.description.placeholder')" type="text"
                                       value="{{old('description')}}">
                            </div>
                            @component('components.validation-errors', ['field'=>'description'])
                            @endcomponent


                        </div>


                    </div>

                    <div class="col-md-6 first">






                    </div>

                    <div class="col-md-6">


{{--                        <div class="form-group @if($errors->has('title')) has-error @endif">--}}
{{--                            <label for="id_title" class="col-sm-3 control-label">* @lang('resources.suggest.title.label')</label>--}}

{{--                            <div class="col-sm-9">--}}
{{--                                <input class="form-control" id="id_title" maxlength="255" name="title"--}}
{{--                                       placeholder="@lang('resources.suggest.title.placeholder')" type="text"--}}
{{--                                       value="{{old('title')}}">--}}
{{--                            </div>--}}
{{--                            @component('components.validation-errors', ['field'=>'title'])--}}
{{--                            @endcomponent--}}


{{--                        </div>--}}











                    </div>


                </div>

                <div class="col-md-6 first">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="btn btn-primary btn-directional fa-plus-circle btn-lg submit-button-wrapper" id="add-div">
                            <input type="submit" id="add-button" value="@lang('resources.suggest.button')">
                        </div>
                    </div>
                </div>
            </form>



        </div>
    </section><!-- #page-title end -->













@endsection


