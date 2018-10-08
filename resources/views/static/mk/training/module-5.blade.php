@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>�������� �������� � ��������� �� ����������</h1><span>�� ����� ������</span></div>

                    <hr>

                    <p>������������ �� ��������, ���������, �������� � ���������������� ���� ������ �� ���������� � ���� �� ���������� �������� �� ���������� � ������ �� ������������� �� XXI ���.</p>

                    <p>���������� �� ��������� � �������� �� ���������� ��� ����� ���������� �� ���������, ���弝� ������ �� �� ������� �������� ����������� ���� ��� � �������� ��������, ������ ������ � ���������. ���� ���� �� ��������� ������������ � ���������� �� ��������� � ���� �� �� ������� �� ��������� �� �������� ��������� � ��������� ���� �� ������� �� ����������. ���������� � ���� ���� ���� ��� ��������� ������������, ���弝� � ����� �������� �� ����� ������� �� ������� �� �������� ������� � ������� (� ������ � �������) � ��������� ����� �� ��������� �� ������� �� �������.</p>

                    <p>���������� �� ��� ����� ���� ��� ����� ������, ���������� ��������� �� Scientix � ��������� �� STEM �� ����'A����� �� �����������, ������ �� ���� ����� ��������� ������� �� ��� ���� ������������ ���� �� �� ����������� ����������� � ���������� �� ����������, �� ��� �����������༝� �� ��������� ������� �� ������������� ������.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/5V9G-vWWSik"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+5_Making_Robotics_Tinkering+_Video+script.docx">��������� �� ��������������</a></p>

                    <h2>���������� ��� �� �� ��������� ��� ��� �� �������� �� ���������?</h2>

                    <p>�������� ���� �� ��������� �� ������ ������ � ������������ ��������� �� ���������.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+1_Primary.docx">��������� 1 - ���� �� �� ������� ��������� ���� �� �����-����� �� ������� ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+2_Lower+Secondary.docx">��������� 2 - ���� �� �� ������� ��������� ��� �������� ���� �� ������� ������ �� ������ ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+5_+Making_Robotics_+Tinkering_Lesson_plan+3_+Upper+Secondary.docx">��������� 3 - ���� �� �� ������� ��������� ��� �������� ���� �� ������� ������ �� ������ ��������</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection