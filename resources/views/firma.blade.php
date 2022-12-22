<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Firma</title>
</head>
<body>
<style>
    a {
        text-decoration: none;
    }
</style>
<!--[if mso]>
<style type="text/css">
a {
    text-decoration: none;
}
</style>
<![endif]-->
<br/>
<table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0" cellpadding="0">
    <tbody>
    <tr>
        <td>
            <img style="max-width: 150px; display: block;"
                 src="{{$cargo['departamento']['empresa']['logo_em']}}"
                 role="presentation" width="150" alt="logo">
        </td>
    </tr>
    <tr>
        <td>
            <table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td style="vertical-align: top;">
                        <table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                 
                                <td style="text-align: center;">
                                    <img style="max-width: 86px;"
                                         src="https://github.com/Inpsercom-IT/app-image/blob/master/inpsercom/firma/certificacion_logo.png?raw=true"
                                         role="presentation" width="86"
                                         alt="logo-certificado">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <table style="font-size: medium; font-family: Trebuchet MS; display: inline-block;"
                                           cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr style="text-align: center;">
                                            @if ($skype_re)
                                                <td>
                                                    <a style="display: inline-block; padding: 0px; background-color: {{$cargo['departamento']['empresa']['color_em']}}; text-decoration: none;"
                                                       href="skype:{{$skype_re}}?call"
                                                       color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                       class="sc-bRBYWo ccSRck"><img
                                                            style="background-color: {{$cargo['departamento']['empresa']['color_em']}}; max-width: 50px; display: block;"
                                                            src="https://raw.githubusercontent.com/serobalino/signGenerator/master/public/images/skype.png"
                                                            alt="skype"
                                                            color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                            class="sc-Rmtcm gwGgYM" height="17"></a>
                                                </td>
                                            @endif
                                            @if ($linkedin_re)
                                                <td>
                                                    <a style="display: inline-block; padding: 0px; background-color: {{$cargo['departamento']['empresa']['color_em']}}; text-decoration: none;"
                                                       href="{{$linkedin_re}}"
                                                       color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                       class="sc-bRBYWo ccSRck"><img
                                                            style="background-color: {{$cargo['departamento']['empresa']['color_em']}}; max-width: 50px; display: block;"
                                                            src="https://raw.githubusercontent.com/serobalino/signGenerator/master/public/images/linkedin.png"
                                                            alt="linkeding"
                                                            color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                            class="sc-Rmtcm gwGgYM" height="17"></a>
                                                </td>
                                            @endif
                                            @if ($github_re)
                                                <td>
                                                    <a style="display: inline-block; padding: 0px; background-color: {{$cargo['departamento']['empresa']['color_em']}}; text-decoration: none;"
                                                       href="{{$github_re}}"
                                                       color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                       class="sc-bRBYWo ccSRck"><img
                                                            style="background-color: {{$cargo['departamento']['empresa']['color_em']}}; max-width: 50px; display: block;"
                                                            src="https://raw.githubusercontent.com/serobalino/signGenerator/master/public/images/github.png"
                                                            alt="github"
                                                            color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                            class="sc-Rmtcm gwGgYM" height="17"></a>
                                                </td>
                                            @endif
                                            <td width="5">
                                                <div></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <div>   </div>
                    </td>
                    <td style="padding: 0px; vertical-align: middle">
                        <h4 style="margin: 0px; font-size: 16px; color: rgb(0, 0, 0);" color="#000000">
                            <span>{{$nombre_re}}</span><span>&nbsp;</span><span>{{$apellido_re}}</span>
                        </h4>
                        <p style="margin: 0px; color: rgb(0, 0, 0); font-size: 13px; line-height: 13px;" color="#000000"
                           font-size="medium">
                            <span>{{$cargo['nombre_ca']}} |  {{$cargo['departamento']['titulo_de']}}</span>
                        </p>
                        <div>
                            <table style="width: 100%;" cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td>
                                        <img
                                            src="https://raw.githubusercontent.com/Inpsercom-IT/app-image/master/inpsercom/firma/line.png"
                                            alt="line">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 100%; border-left: medium none; display: block;"
                                        color="{{$cargo['departamento']['empresa']['color_em']}}" direction="horizontal"
                                        height="1"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr style="vertical-align: middle;" height="17">
                                <td style="vertical-align: middle;" width="15">
                                    <table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0"
                                           cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align: bottom;">
                                                <span width="11"
                                                      style="display: block; background-color: {{$cargo['departamento']['empresa']['color_em']}};"
                                                      color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                      class="sc-iRbamj blSEcj"
                                                >
                                                    <img
                                                        style="display: block; background-color: {{$cargo['departamento']['empresa']['color_em']}};"
                                                        src="https://raw.githubusercontent.com/serobalino/signGenerator/master/public/images/telefono.png"
                                                        color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                        width="13">
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding: 0px; color: rgb(0, 0, 0);">
                                    @if ($cargo['departamento']['empresa']['tell_em']) <a
                                        style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px; text-decoration: none;"
                                        href="tel:{{$cargo['departamento']['empresa']['tell_em']}}" color="#000000"
                                        class="sc-jlyJG bbyJzT"> @if ($cargo['departamento']['empresa']['telp_em'])
                                            <span>{{$cargo['departamento']['empresa']['telp_em']}}</span>  @if ($ext_re)
                                                <span>Ext.: {{$ext_re}}</span>@endif </a> | @endif @endif <a
                                        style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px; text-decoration: none;"
                                        href="tel:{{$cell_re}}" color="#000000"
                                        class="sc-jlyJG bbyJzT"><span>{{$celp_re}}</span></a></td>
                            </tr>
                            <tr style="vertical-align: middle;" height="17">
                                <td style="vertical-align: middle;" width="15">
                                    <table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0"
                                           cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align: bottom;">
                                                <span width="11"
                                                      style="display: block; background-color: {{$cargo['departamento']['empresa']['color_em']}};"
                                                      color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                      class="sc-iRbamj blSEcj"><img
                                                        style="display: block; background-color: {{$cargo['departamento']['empresa']['color_em']}};"
                                                        src="https://raw.githubusercontent.com/serobalino/signGenerator/master/public/images/email.png"
                                                        color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                        width="13">
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding: 0px;"><a
                                        style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px; text-decoration: none;"
                                        href="mailto:{{$email_re}}" color="#000000"
                                        class="sc-jlyJG bbyJzT"><span>{{$email_re}}</span></a></td>
                            </tr>
                            <tr style="vertical-align: middle;" height="17">
                                <td style="vertical-align: middle;" width="15">
                                    <table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0"
                                           cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align: bottom;">
                                                <span width="11"
                                                      style="display: block; background-color: {{$cargo['departamento']['empresa']['color_em']}};"
                                                      color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                      class="sc-iRbamj blSEcj">
                                                    <img
                                                        style="display: block; background-color: {{$cargo['departamento']['empresa']['color_em']}};"
                                                        src="https://raw.githubusercontent.com/serobalino/signGenerator/master/public/images/web.png"
                                                        color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                        width="13">
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding: 0px;"><a
                                        style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px; text-decoration: none;"
                                        href="//{{$cargo['departamento']['empresa']['dominio_em']}}" target="_blank"
                                        color="#000000"
                                        class="sc-jlyJG bbyJzT"><span>{{$cargo['departamento']['empresa']['dominio_em']}}</span></a>
                                </td>
                            </tr>
                            <tr style="vertical-align: middle;" height="17">
                                <td style="vertical-align: middle;" width="15">
                                    <table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0"
                                           cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td style="vertical-align: bottom;">
                                                <span width="11"
                                                      style="display: block; background-color: {{$cargo['departamento']['empresa']['color_em']}};"
                                                      color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                      class="sc-iRbamj blSEcj">
                                                    <img
                                                        style="display: block; background-color: {{$cargo['departamento']['empresa']['color_em']}};"
                                                        src="https://raw.githubusercontent.com/serobalino/signGenerator/master/public/images/mapa.png"
                                                        color="{{$cargo['departamento']['empresa']['color_em']}}"
                                                        width="13">
                                                </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding: 0px;"><a
                                        style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;"
                                        href="http://maps.google.com/maps?daddr={{$cargo['departamento']['empresa']['lat_em']}},{{$cargo['departamento']['empresa']['lng_em']}}&ll=true"
                                        target="_blank" color="#000000"
                                        class="sc-jlyJG bbyJzT"><span>{{$cargo['departamento']['empresa']['direccion_em']}}</span></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table style="font-size: medium; font-family: Trebuchet MS;" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td height="15"></td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>

