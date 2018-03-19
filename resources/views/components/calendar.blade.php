<div id="calendar">
    <table border="0" cellpadding="0" cellspacing="0" class="month">
        <tbody>
        <tr>
            <th colspan="7" class="month">{{Calendar::format_month($event->start_date)}}</th>
        </tr>
        <tr>
            <th class="mon">Mon</th>
            <th class="tue">Tue</th>
            <th class="wed">Wed</th>
            <th class="thu">Thu</th>
            <th class="fri">Fri</th>
            <th class="sat">Sat</th>
            <th class="sun">Sun</th>
        </tr>
        {!! Calendar::get_calendar($event)!!}

        </tbody>
    </table>

</div>