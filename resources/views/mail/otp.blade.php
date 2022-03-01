<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!--meta link-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- title -->
    {{-- <title>Terima Kasih Sudah Mengisi Formulirnya</title> --}}

</head>

<body
    style="font-family: 'Lato', sans-serif; font-size: 14px; background-color: #fff; color: #444444; margin: 0; padding: 0;">
    <!-- BODY -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td style="padding: 20px 0 30px;">
                <!-- MAIN -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center"
                    style="max-width:600px;border-collapse: collapse;">
                    <!--  MAIN-CONTENT -->
                    <tr>
                        <td>
                            <img src="{{ asset('assets/images/mail/otp/banner.jpg') }}" alt="Background Car"
                                style="max-width: 100%;display: inline-block;" />
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:40px 30px;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom:20px;" colspan="2">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <th>
                                                    <p
                                                        style="margin:unset; line-height: 1.5; font-size: 22px; font-weight: 800;">
                                                        Here is the OTP code you need</p>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="padding: 30px 0 0 0; color: #d83638; font-size: 28px; font-weight: 800;">
                                                    {{ $otp->token }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="padding: 0 20px; font-size: 20px; line-height: 1.5;">
                                                    <p>Don't give this code to anyone,<br>
                                                        don't trust other people<br>
                                                        <b>We don't give a fuck about account loss cases.</b>
                                            </tr>
                                            <tr>
                                                <td align="center" style="padding: 0 30px ;font-size: 22px;"><b>Thank you!</b></td>
                                            </tr>
                                            {{-- <tr>
                                                <td align="center"
                                                    style="padding: 0 20px; font-size: 20px; line-height: 1.5;">
                                                    <p>
                                                        {{ \Illuminate\Foundation\Inspiring::quote() }}
                                                    </p>
                                                </td>
                                            </tr> --}}
                                            {{-- <tr>
                                                <td align="center" style="padding: 0 30px ;font-size: 22px;">Salam!</td>
                                            </tr> --}}
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- MAIN-CONTENT END -->

                    <!-- FOOTER SECTION START -->
                    <tr>
                        <td align="center"
                            style="background-color: #f2f2f2;text-align: center; padding: 40px 30px; font-size: 16px; line-height: 1.7;">
                            <span style="color:red">*</span> {{ \Illuminate\Foundation\Inspiring::quote() }}
                            {{-- {{ $company->official_name }} --}}
                        </td>
                    </tr>
                    <!-- FOOTER SECTION END -->
                </table>
            </td>
            </td>
    </table>
    <!-- BODY END -->
</body>

</html>
