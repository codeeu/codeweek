<div class="codeweek-view-calendar">
    <table border="0" cellpadding="10" cellspacing="0" class="month">
        <tbody>
        <tr>
            <th colspan="7" class="month">{{Carbon\Carbon::parse($event->start_date)->isoFormat('MMMM YYYY')}}</th>
        </tr>
        <tr>
            <th class="mon">{{Carbon\Carbon::now()->firstOfMonth(1)->isoFormat('ddd')}}</th>
            <th class="tue">{{Carbon\Carbon::now()->firstOfMonth(2)->isoFormat('ddd')}}</th>
            <th class="wed">{{Carbon\Carbon::now()->firstOfMonth(3)->isoFormat('ddd')}}</th>
            <th class="thu">{{Carbon\Carbon::now()->firstOfMonth(4)->isoFormat('ddd')}}</th>
            <th class="fri">{{Carbon\Carbon::now()->firstOfMonth(5)->isoFormat('ddd')}}</th>
            <th class="sat">{{Carbon\Carbon::now()->firstOfMonth(6)->isoFormat('ddd')}}</th>
            <th class="sun">{{Carbon\Carbon::now()->firstOfMonth(0)->isoFormat('ddd')}}</th>
        </tr>
        {!! Calendar::get_calendar($event)!!}
        </tbody>
    </table>
</div>