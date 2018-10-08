@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>�������� ������������ - ����� �� Scratch</h1><span>�� ����� ������</span></div>

                    <hr>

                    <p>���������� ������������ �� ���������� �� ����� �� �� ������ ��������� �� �������� �� ���������� ��� �������. ���������� ��������� �� ���������� ������������ ���� ����������� �� �������������� �������� �� �����. �������� �� �������� ������������ (VPL) �� ������������ ����� ������������ �� ������� ������������ ������������ �� ���� (�� ���� � �� ��������). �� VPL ��� ������� �� ������ � ���� �������� �� ������������.</p>

                    <p>�� ��� �����, ����� ������, ��������� �� ����� �� ��� �� �� ����� � ��������� �� Techies Lab asbl (������), �� �� ������� �� �� �������� Scratch, ���� �� ������������� VPL ��� �� �������� �������� ��� ������. Scratch � ������� �� MIT �� 2002 ������ � ������� ����� ���� �� ������� ������ ��������, ���� ��� ���� �� ������ ������� ������� ��� ���� �� �� ����������� �� ��������� � �������� �������� �� ������� ������.</p>

                    <p>�� � �������� �� ����� �������� �� �������� �� �� �� ��������� Scratch, � ���� �� �� ������������ �� ������� �������� ��������! �� ������, �� �������� �� Scratch ���� ��������� ������ �� ����������� ��������, ��������� ���� �� ��������� ��������, �� ����������� ����������� ������� ��� �� ����������� �� ��������� ��������� �� �� ������ �� ���������� ���������� ������ ���� �������� � ����������� ������������, � ��� � ������� ������ �� ����������.</p>

                    <p>Scratch � ��������� ������, ����� ���������� � ����������� �� ���������. ���������� �� ������� �� ����� �� ������� ���� �� ���������.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/pmfCwauN1c0"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">��������� �� ��������������</a></p>

                    <h2>���������� ��� �� �� ��������� ��� ��� �� �������� �� ���������?</h2>

                    <p>�������� ���� �� ��������� �� ������ ������ � ������������ ��������� �� ���������.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">��������� 1 - ������ �� Scratch �� ������� ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">��������� 2 - ������ �� Scratch �� ������� ������ �� ������ ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">��������� 3 - ������ �� Scratch �� ������� ������ �� ������ ��������</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection