@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>�������� ��� ��������� (��� ��������)</h1><span>�� ��������� �����</span></div>

                    <hr>

                    <p>���������� � ������� �� �������, �� �� ���������� �� �������� �������� �� ��� �� ������������ ���� ��������������� �� �������� �������� ������ ��� ���� �� �� ������������ ����� ���. ���������� � �������� ����� �� ����������� �� ������ � ������������� ����� �� �� ������� ������������� �� ����������� ������. �����, �� � ��������� �������� ���������� �� �� �� ������ ����������� ������.  �� �������� �����, ��������� �� ����������� ������ �� ��������� �� �� �������� ������������� �� ������������.</p>

                    <p>�� ��� �����, ��������� �����, �������� �� ����������� ������� �� ������ � ����������� �� ���������� ������ �� ��������, �� ��������� ���������� �� �������� ��� �������� ��� ���� �� �� ������������ ��� ����� ���� ����������� ����. �������� ��� �� ������������ ��� �������� � �� �� ������� ��������� �� ����������� �� �� �� ������ ���������� �� ����� ��������, ��� ����� �� ������������� � ��������.</p>

                    <p>������������ �� �������� ��� �������� �� ��������� ������������� ������� �� ��������� ���� ����� ���.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/18N1CaQJ0GI "></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Video_script.docx">��������� �� ��������������</a></p>

                    <h2>���������� ��� �� �� ��������� ��� ��� �� �������� �� ���������?</h2>

                    <p>�������� ���� �� ��������� �� ������ ������ � ������������ ��������� �� ���������.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+1_Primary.docx">��������� 1 - CodyRoby �� ������� ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson_plan+2_Lower+Second....docx">��������� 2 - CodyRoby �� ������� ������ �� ������ ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+1_Unplugged_Coding_Lesson+plan+3_Secondary.docx">��������� 3 - CodyRoby �� ������ ��������</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection