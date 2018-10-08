@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>�������� ���������� ���� �� Scratch</h1><span>�� ����� ������ ����</span></div>

                    <hr>

                    <p>�������� ������������, ���������, �������� ��������, ����������� ������������ � ����������� �� ���� ����� �� �������� ������� ��� �� �� �������� �� ��������� �� ������ �� XXI ���, � ���������� ���� �� �� ������� �� �� ���������� �� ������� � ����������� �����.</p>

                    <p>�������������� ����� �� �������� �� ��� �� �������� �� �������� �� �������� � �������, ����������� �������� �� �������� �� �������� � ����� ��� ������������� �� ������� ���� �� ������ ���� ������������ ��������, �� �� ��� ����� �� �������� ���� ��� �� ������� �� �� ������ ������� ��� �������.</p>

                    <p>�� ��� �����, ����� ������ ����, ��������� �� ����������� ����� � ���������� �� ������ �� ������ ���� ���� �� �� �������� ���� � ����� ������� �� ��������� ������ �� ����������. ���� ���� �� �� ������� ���? �� �������� ���� �� ������� � �������� �� Scratch, ������������� ���������� ����� ��� �� ������� ��� ���������� ��� ������ ����. Scratch �� ���� ��� �� ��������� ������������� ������������, ���� ���� ���� ��������� ��������� �� �������� �� ���������� ���� �� ���������� �� �� �� ����� ����������� �� ��������� ������ ���� � �� ����������.</p>

                    <p>���������� �� ������� �� ������� ���� �� ���������.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/M1zJOfmriGU"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+4_Educational_Games_Scratch+_Video+script.docx">��������� �� ��������������</a></p>

                    <h2>���������� ��� �� �� ��������� ��� ��� �� �������� �� ���������?</h2>

                    <p>�������� ���� �� ��������� �� ������ ������ � ������������ ��������� �� ���������.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+1_Primary.docx">��������� 1 - ���� �� ������� � �������� �� Scratch �� ������� ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+2_Lower+Secondary.docx">��������� 2 - ���� �� ������� � �������� �� Scratch �� ������� ������ �� ������ ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_+EUCodeWeek_Learning+Bit+4_+Educational_Games_Scratch+Lesson+plan+3_+Secondary.docx">��������� 3 - ���� �� ������� � �������� �� Scratch �� ������ ��������</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection