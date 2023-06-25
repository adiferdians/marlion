<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        @font-face {
            font-family: 'Roboto';
            src: url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            color: #333333;
            right: 0;
            padding-left: 100px;
        }

        .marlion-logo {
            position: absolute;
            z-index: -10;
            transform: rotate(90deg);
            padding-top: 1000px;
            opacity: 50%;
        }

        .marlion-logo2 {
            position: absolute;
            z-index: -10;
            bottom: 200px;
            width: 200px;
        }

        .tab-logo {
            position: absolute;
            z-index: -10;
            bottom: 200px;
            right: 300px;
            width: 100px;
        }

        .certified {
            position: absolute;
            z-index: -10;
            bottom: 200px;
            right: 100px;
            width: 150px;
        }

        .draft {
            position: absolute;
            z-index: -9;
        }
    </style>
</head>

<body background="/assets/img/logo/background.png">
    <div>
        <!-- <img src="{{ asset('/assets/img/logo/draft.png') }}" alt="" class="draft">
        <img class="marlion-logo2" src="{{ asset('/assets/img/logo/logo.png') }}">
        <img class="tab-logo" src="{{ asset('/assets/img/logo/tab.png') }}">
        <img class="certified" src="{{ asset('/assets/img/logo/Asset mark 9k.png') }}"> -->
    </div>
    <table style="width: 100%;">
        <tr>
            <td colspan="2" style="height: 80px; vertical-align: top;">
                <span style="font-size: 40px;">Certificate Of registration</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>{{$sub_title}}</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="height: 50px; vertical-align: top;">
                <span style="font-size: 20px;">{{ $title }}</span>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 50%;">
                <span>This is to certify that:</span>
            </td>
            <td>
                <span>{{$name}} <br>
                    {{$address}}
                </span>
            </td>
        </tr>
        <tr style="height: 80px; vertical-align: bottom;">
            <td>
                <span>Holds Certificate No:</span>
            </td>
            <td>
                <span>{{ $number }}</span>
            </td>
        </tr>
        <tr style="height: 30px; vertical-align: bottom;">
            <td colspan="2">
                <span>and operates an {{ $sub_title}} which complies with the
                    requirements of {{$title}} for the following scope:</span>
            </td>
        </tr>
        <tr style="height: 30px; text-align: right;">
            <td colspan="2">
                <span>Provision of information technology services including software and hardware.</span>
            </td>
        </tr>
        <tr style="height: 250px; vertical-align: bottom;">
            <td>
                <span>For and on behalf of Merlion:</span>
            </td>
            <td>
                <hr style="width: 200px;">
                <span style="justify-content: center;">Managing Director</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <span>Effective date : </span>
                <span>&emsp;{{ $effective}}</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <span>Expiry date &emsp;: </span>
                <span>&emsp;{{ $expired}}</span>
            </td>
        </tr>
        <tr style="width: 300px;">
            <td style="height: 300px; vertical-align: bottom;">
                <span style="font-size: 10px;">
                    The approval iS subject to the company maintaining is systern the required standards.<br>
                    which will be monitored by Merlion Certification Body.<br>
                    Certificate Will be issued annualu for agrement 36 month since registered.<br>
                    Remans valid subject to satisfactory surveillance audit.<br>
                    All nght reserved. detail www.merlon-cbcom
                </span>
            </td>
            <td></td>
        </tr>
    </table>
</body>

</html>