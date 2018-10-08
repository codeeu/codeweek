@extends('layout.base') @section('content')<section>

        <div class="container">

            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>����������� ������������ � �������� ��������</h1><span>�� ���� ����</span></div>

                    <hr>

                    <p>������������� ������������ (��) ������� ����� �� ������� �� ���������� � ��������� ��� �� ���� �� �� �������� �������� �� �� ������� �� �� ������ � ���������.  ������������� ������������ �� � ������� ���� �� ������� �� ����������� ��������, ���� ���� ���� ���� �� �� ������� �� ������� �������� �������� ��� ���� ����������.</p>

                    <p>���� �� �� ��������� �� �� ��������� ���� ��� �� �� ������� �� �������� ���������� �������� �� ������ (�����������), �� ������������ ������� (������������ �������), �� �������������� ���������� ������ �� �������� ������� (����������); ��� ����������� ������� ��� �������� �� ���������� ������ �� �� �� �������� ������������ �������� (����� �� ���������). �� ���� �� �� �������� ��� �������� ����������, �� ������ �� ���������� (�� �� ������ ��������� �� ����������� �������� �� ���� ���), ���������� (����������� �� ��������� �� ������� �� ������� �� �������, ���� � ���������), ������ (������ ������� �� ��������� ����� �� ������ ��� ������ �� ������� ��������� ���� � ������� �� ������) � ����� �����.</p>

                    <p>�� ��� �����, ���� ����, ������ �������� �� ����������� �������� ��� ������������� ��������� �� �������� (��������� ��������), �� �� ��������� ��������� �� ����������� ������������ � ���������� ������ ��� ��������� ���� �� �� ��������� �� �������� �� ���������� ����.</p>

                    <div class="flex youtube-container"><iframe class="flex-1 youtube-iframe"
                                src="https://www.youtube.com/embed/Nc-V948dXWI"></iframe></div>

                    <p><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">��������� �� ��������������</a></p>

                    <h2>���������� ��� �� �� ��������� ��� ��� �� �������� �� ���������?</h2>

                    <p>�������� ���� �� ��������� �� ������ ������ � ������������ ��������� �� ���������.</p>

                    <ul>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">��������� - ��������� ����������� ������������ �� ������� ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">��������� 2 - ����������� �� ��������� �� ������� ������ �� ������ ��������</a></li>
                        <li><a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">��������� 3 - ��������� �� ������� ������ �� ������ ��������</a></li>
                    </ul>@if(view()->exists('static.'.App::getLocale().'.training.footer')) @include('static.'.App::getLocale().'.training.footer') @else @include('static.en.training.footer') @endif</div>

            </div>

        </div>

    </section>@endsection