<div id="banner_teacher" class="container clearfix">
    <img src="/img/banner_training.svg">
</div>

@section("extra-css")
    <style>

        .section-intro, .section-banner {

            background: transparent;

        }

        .teachers-banner{
            width:100%;
        }
        .teachers-banner .text{
            position:absolute;
            margin-left:35%;
            top:20%;
        }
        .teachers-banner .title{
            font-size: 3vw;
            font-weight: bold;
            color:orangered;
            font-family: 'Raleway', sans-serif;
        }
        .teachers-banner .content a{
            font-style: italic;
            font-size: 2vw;
            color:orangered;
            font-family: 'Raleway', sans-serif;
            text-decoration: none;
        }

        @media (min-width: 470px) {
            #banner_teacher {
                height: 120px;
            }
            #banner_teacher .banner_teacher_text{
                font-size: 25px;
            }
        }

        @media (min-width: 990px) {
            #banner_teacher {
                height: 180px;
            }
            #banner_teacher .banner_teacher_text{
                font-size: 35px;
            }
        }

        @media (min-width: 1200px) {
            #banner_teacher {
                height: 220px;
            }
            #banner_teacher .banner_teacher_text{
                font-size: 42px;
            }
        }

        #banner_teacher {
            display:flex;
            align-items: center;
            margin-bottom: 30px;
            justify-content: center;
        }
        #banner_teacher img{
            height: 100%;
        }

        #banner_teacher .banner_teacher_text{
            margin-left: 20px;
            line-height: 50px;
            font-family: 'Raleway', sans-serif;
            color:#EA5D34;
        }

        #banner_teacher .banner_teacher_text .banner_teacher_title{
            font-weight: bold;
        }


    </style>

@endsection