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
            left: 0;
            bottom: 200px;
            width: 200px;
        }

        .tab-logo {
            position: absolute;
            z-index: -10;
            bottom: 200px;
            right: 200px;
            width: 100px;
        }

        .certified {
            position: absolute;
            z-index: -10;
            bottom: 200px;
            right: 0px;
            width: 150px;
        }

        .draft {
            position: absolute;
            left: 0;
            width: 800px;
            z-index: 100;
        }

        .qrCode {
            position: absolute;
            right: 0;
            width: 80px;
        }

        .bgimage {
            z-index: -99;
            position: absolute;
            width: 800px;
            top: -70px;
            right: -50px;
        }

        .sign {
            width: 150px;
            padding-left: 70px;
        }

        .approval {
            font-size: 10px; 
            position: absolute;
            bottom: 100px;
            left: 0px;
        }
    </style>
</head>

<body>
    <div>
        @if($status == "draft")
        <img class="draft" src="{{ public_path('/assets/img/logo/draft.png') }}">
        @endif
        <img class="marlion-logo2" src="{{ public_path('/assets/img/logo/logo.png') }}">
        <img class="tab-logo" src="{{ public_path('/assets/img/logo/tab.png') }}">
        @if($iso == 9)
        <img class="certified" src="{{ public_path('/assets/img/logo/9k.png') }}">
        @elseif($iso == 22)
        <img class="certified" src="{{ public_path('/assets/img/logo/22k.png') }}">
        @elseif($iso == 27)
        <img class="certified" src="{{ public_path('/assets/img/logo/27k.png') }}">
        @endif
        <img class="qrCode" width="300" height="auto" src="data:image/svg+xml;base64,{{$qrCode}}" alt="QR Code" />
        <img class="bgimage" src="{{ public_path('/assets/img/logo/background.png') }}">
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
        <tr>
            <td>
                <img style="height: 30px;" src="{{ public_path('/assets/img/space.png') }}">
            </td>
        </tr>
        <tr>
            <td>
                <span>Holds Certificate No:</span>
            </td>
            <td>
                <span>{{ $number }}</span>
            </td>
        </tr>
        <tr>
            <td>
                <img style="height: 30px;" src="{{ public_path('/assets/img/space.png') }}">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>and operates an {{ $sub_title}} which complies with the<br>
                    requirements of {{$title}} for the following scope: <br><br>
                    {{$scope}}</span>
            </td>
        </tr>
        <tr>
            <td>
                <img style="height: 30px;" src="{{ public_path('/assets/img/space.png') }}">
            </td>
        </tr>
        <tr style="vertical-align: bottom;">
            <td>
                <span>For and on behalf of Merlion:</span>
            </td>
            <td>
                <img class="sign" src="{{ public_path('/assets/img/logo/tab.png') }}">
                <hr style="width: 200px;">
                <span style="padding-left: 90px;">Managing Director</span>
            </td>
        </tr>
        <tr>
            <td>
                <img style="height: 10px;" src="{{ public_path('/assets/img/space.png') }}">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <span>Effective date : </span>
                <span>{{ $effective}}</span>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <span>Expiry date : </span>
                <span>{{ $expired}}</span>
            </td>
        </tr>
        <tr style="width: 300px;">
            <td style="height: 380px;">
                <span class="approval">
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