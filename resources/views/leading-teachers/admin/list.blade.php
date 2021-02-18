@extends('layout.base')

@section('content')
    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header" style="display: flex; justify-content: space-between;">

            <h1>Leading Teachers List</h1>
        </section>

        <section class="codeweek-content-header" style="display: flex; justify-content: space-between;">
            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Country</th>
                </tr>
                </thead>
                <tbody>


                    @foreach($leadingTeachers as $leadingTeacher)
                        <tr>
                            <td>{{$leadingTeacher->fullname}}</td>
                            <td>{{$leadingTeacher->country->name}}</td>
                        </tr>

                    @endforeach



                </tbody>
            </table>

        </section>

    </section>
@endsection
