<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>

    <style>
        @media (prefers-color-scheme: dark) {
            .darkmode {
                background: #19191a !important;
            }

            .darkmode_bg {
                background: #d2d2d2 !important;
            }

            .darkmode_email_bg {
                background: #1f1f1f !important;
            }

            .darkmode_color {
                color: #d2d2d2 !important;
            }

            .darkmode_button {
                background: #a32941 !important;
                color: #cac9c9 !important;
            }
        }

        [data-ogsc] .darkmode {
            background: #19191a !important;
        }

        [data-ogsc] .darkmode_bg {
            background: #d2d2d2 !important;
        }

        [data-ogsc] .darkmode_email_bg {
            background: #1f1f1f !important;
        }

        [data-ogsc] .darkmode_color {
            color: #d2d2d2 !important;
        }

        [data-ogsc] .darkmode_button {
            background: #a32941 !important;
            color: #cac9c9 !important;
        }
    </style>
</head>

<body>
    <div class="darkmode"
        style="width: 100%; background: #F6F8FD; position: relative;  margin: 0 auto;    font-family: sans-serif;">

        <div style="padding-top: 0; padding-left: 30px; padding-right: 30px;">
            <a href="{{route('home')}}" class="darkmode_bg"
                style="display: flex; width: 115px; height: 39px; border-radius: 0px 0px 8px 8px; background: #ffffff; margin: 0 auto; margin-bottom: 15px;">
                <img src="{{asset('/temple/images/layout/logo.png')}}"
                    style="display: block; margin: auto; padding: 7px 10px; width: calc(100% - 20px);" alt="logo">
            </a>
            <div class="darkmode_email_bg"
                style="display: block; margin: 0 auto; background: #fff; width: 100%; max-width: 540px; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <div
                    style="display: block; margin: 0 auto; width: 100%; max-width: 388px; padding-top: 59px; padding-bottom: 59px;">
                    @yield('content')
                </div>
            </div>


        </div>
    </div>
</body>

</html>
