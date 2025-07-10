@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Participation certificate', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
<section class="bg-light-blue">
    <section class="relative flex overflow-hidden">
        <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-20">
            <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                <div class="codeweek-container-lg flex flex-col">
                    <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat'] mb-6 max-w-[864px]">
                        @lang('participation.title')
                    </h2>
                    <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px]">
                        @lang('participation.phrase1')
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 tablet:py-20 bg-yellow-50">
        <div class="codeweek-container">
            <div class="md:px-8 lg:px-20">
                <div class="bg-white px-5 py-8 rounded-xl tablet:px-24 tablet:py-16 tablet:rounded-3xl">
                    <form method="POST" id="event" role="form" enctype="multipart/form-data" action="/participation">
  
                        {{csrf_field()}}
        
                        <div>
                            @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'names','type'=>'text','required'=>true,'help'=>'names.help','placeholder'=>'Enter name for the certificate'])@endcomponent
                            @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'event_name','type'=>'text','required'=>true,'help'=>'event_name.help','placeholder'=>'Enter activity name'])@endcomponent
                            @component('components.report.form-field-simple',['section'=>'participation','field_name'=>'event_date','type'=>'date','required'=>true,'help'=>'event_date.help','placeholder'=>'Select activity date'])@endcomponent
        
                            <div class="flex justify-center pt-2">
                                <input class="cursor-pointer text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-4 px-20 font-semibold text-base" type="submit" value="@lang('participation.submit')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
