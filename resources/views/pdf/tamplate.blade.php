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
            right: 200px;
            width: 200px;
        }

        .certified {
            position: absolute;
            z-index: -10;
            bottom: 200px;
            right: 100px;
            width: 200px;
        }

        .draft {
            position: absolute;
            z-index: -9;
        }
    </style>
</head>

<body>
    <div>
        <img class="marlion-logo" src="{{ asset('/assets/img/logo/logo.png') }}">
        <img src="{{ asset('/assets/img/logo/draft.png') }}" alt="" class="draft">
        <img class="marlion-logo2" src="{{ asset('/assets/img/logo/logo.png') }}">
        <img class="tab-logo" src="{{ asset('/assets/img/logo/logo.png') }}">
        <img class="certified" src="{{ asset('/assets/img/logo/logo.png') }}">
    </div>
    <table style="width: 100%;">
        <tr>
            <td colspan="2" style="height: 80px; vertical-align: top;">
                <span style="font-size: 40px;">Certificate Of registration</span>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <span>INFORMATION SECURITY MANAGEMENT SYSTEM</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="height: 50px; vertical-align: top;">
                <span style="font-size: 20px;">ISO {{ $number }}</span>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <span>This is to certify that:</span>
            </td>
            <td>
                <span>PT CHANDRA ANDHESTHI CAKSANA <br>
                    The City Residence Komplek Rukan Malibu Blok J No.<br>
                    36, Cengkareng Timur, Cengkareng Kota, Jakarta Barat,<br>
                    Jakarta, Indonesia
                </span>
            </td>
        </tr>
        <tr style="height: 80px; vertical-align: bottom;">
            <td>
                <span>Holds Certificate No:</span>
            </td>
            <td>
                <span>ISO {{ $number }}</span>
            </td>
        </tr>
        <tr style="height: 30px; vertical-align: bottom;">
            <td colspan="2">
                <span>and operates an Information Security Management System which complies with the
                    requirements of ISO 27001:2013 for the following scope:</span>
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
                <span>Managing Director</span>
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