<!doctype html>
<html xmlns="https://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    {{--<xml>--}}
    {{--<o:OfficeDocumentSettings>--}}
    {{--<o:AllowPNG/>--}}
    {{--<o:PixelsPerInch>96</o:PixelsPerInch>--}}
    {{--</o:OfficeDocumentSettings>--}}
    {{--</xml><![endif]-->--}}
    <title>Test Email Sample</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!--<![endif]-->
    <style>
        body {
            margin: 0 !important;
            padding: 0 !important;
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
            /*style only recognised by some browsers*/
        }

        img {
            border: 0 !important;
            outline: none !important;
        }

        td img{
            max-width: 250px!important;
            max-height: 100px!important;
        }
        p {
            Margin: 0px !important;
            /*Old versions of Outlook ignore margin if it is lower case as usual*/
            padding: 0px !important;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0px;
            /*Microsoft Office only styling*/
            mso-table-rspace: 0px;
            /*Microsoft Office only styling*/
        }

        td,
        a,
        span {
            border-collapse: collapse;
            mso-line-height-rule: exactly;
            /*Microsoft Office only styling*/
        }

        .ExternalClass * {
            line-height: 100%;
        }

        @media yahoo {
            .em_img {
                min-width: 700px !important;
            }
        }

        .em_img {
            width: 700px !important;
            height: auto !important;
        }

        /* Text decoration removed */
        .em_defaultlink a {
            color: inherit !important;
            text-decoration: none !important;
        }

        span.MsoHyperlink {
            mso-style-priority: 99;
            /*Microsoft Office only styling*/
            color: inherit;
        }

        span.MsoHyperlinkFollowed {
            mso-style-priority: 99;
            /*Microsoft Office only styling*/
            color: inherit;
        }

        /* Media Query for desktop layout */
        @media only screen and (min-width:481px) and (max-width:699px) {
            .em_main_table {
                width: 100% !important;
            }

            .em_wrapper {
                width: 100% !important;
            }

            .em_hide {
                display: none !important;
            }

            .em_img {
                width: 100% !important;
                height: auto !important;
            }

            .em_h20 {
                height: 20px !important;
            }

            .em_padd {
                padding: 20px 10px !important;
            }
        }

        /* Media Query for mobile layout */
        @media screen and (max-width: 480px) {
            .em_main_table {
                width: 100% !important;
            }

            .em_wrapper {
                width: 100% !important;
            }

            .em_hide {
                display: none !important;
            }

            .em_img {
                width: 100% !important;
                height: auto !important;
            }

            .em_h20 {
                height: 20px !important;
            }

            .em_padd {
                padding: 20px 10px !important;
            }

            .em_text1 {
                font-size: 16px !important;
                line-height: 24px !important;
            }

            u+.em_body .em_full_wrap {
                width: 100% !important;
                width: 100vw !important;
            }
        }
    </style>


</head>

<body class="em_body" style="margin:0px; padding:0px;" bgcolor="#efefef">
<table class="em_full_wrap" valign="top" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef"
       align="center">
    <tbody>
    <tr>
        <td valign="top" align="center">
            <table class="em_main_table" style="width:700px;" width="700" cellspacing="0" cellpadding="0"
                   border="0" align="center">
                <!--Header section-->
                <tbody>


                <tr>
                    <td valign="top" align="center">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                            <tr>
                                <td valign="top" align="center" style="background-color: rgb(13, 17, 33);">
                                    <img class="em_img" alt="Welcome to EmailWeb Newsletter"
                                         {{--style="display:block; font-family:Arial, sans-serif; font-size:30px; line-height:34px; color:#000000; min-width:700px"--}}
                                         src="https://powerperformancecars.co.uk/resources/frontend/img/logo/logo.png">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="padding:35px 70px 30px;" class="em_padd" valign="top" bgcolor="#0d1121"
                        align="center">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                            <tr>
                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:16px; line-height:30px; color:#ffffff;" valign="top" align="center">
                                    Congratulation! This User {{$mail->username}}  Create New Advertisement.
                                    <br>
                                    <a href="{{route('car-details',['id'=>base64_encode($id)])}}">Visit Advertisement</a>
                                                     </td>
                            </tr>
                            <tr>
                                <td style="font-size:0px; line-height:0px; height:15px;" height="15">
                                    &nbsp;</td>
                                <!--—this is space of 15px to separate two paragraphs ---->
                            </tr>

                            <tr>
                                <td class="em_h20" style="font-size:0px; line-height:0px; height:25px;"
                                    height="25">&nbsp;</td>

                            </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>




                <tr>
                    <td style="padding:38px 30px;" class="em_padd" valign="top" bgcolor="#f6f7f8"
                        align="center">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                            <tr>
                                <td style="padding-bottom:16px;" valign="top" align="center">
                                    <table cellspacing="0" cellpadding="0" border="0" align="center">
                                        <tbody>
                                        <tr>
                                            <td valign="top" align="center">
                                                <a href="https://www.facebook.com/powerperformancecarsltd/" target="_blank"
                                                   style="text-decoration:none;">
                                                    <img src="http://chrismuster.co.uk/images/facebook.png"
                                                         alt="fb"
                                                         style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:26px;"
                                                         width="26" border="0" height="26">
                                                </a>
                                            </td>
                                            <td style="width:6px;" width="6">&nbsp;</td>
                                            <td valign="top" align="center">
                                                <a href="https://twitter.com/ppcarsltd"
                                                   target="_blank" style="text-decoration:none;">
                                                    <img src="http://chrismuster.co.uk/images/twitter.png"
                                                         alt="twitter"
                                                         style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:27px;"
                                                         width="27" border="0" height="26">
                                                </a>
                                            </td>
                                            <td style="width:6px;" width="6">&nbsp;</td>
                                            <td valign="top" align="center">
                                                <a href="https://www.linkedin.com/company/powerperformancecars/about/"
                                                   target="_blank" style="text-decoration:none;">
                                                    <img src="http://chrismuster.co.uk/images/linkedin.png"
                                                         alt="linkedin"
                                                         style="display:block; font-family:Arial, sans-serif; font-size:14px; line-height:14px; color:#ffffff; max-width:26px;"
                                                         width="26" border="0" height="26">
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-family:'Open Sans', Arial, sans-serif; font-size:11px; line-height:18px; color:#999999;"
                                    valign="top" align="center">
                                    <a href="https://www.powerperformancecars.co.uk/about-us" target="_blank"
                                       style="color:#999999; text-decoration:underline;">ABOUT
                                        US</a> |

                                    <a href="https://www.powerperformancecars.co.uk/contact-us" target="_blank"
                                       style="color:#999999; text-decoration:underline;">CONTACT</a>
                                    <br>
                                    ©2021 power Performance cars. All Rights Reserved.
                                    <br>
                                </td>
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


<div class="em_hide" style="white-space: nowrap; display: none; font-size:0px; line-height:0px;">&nbsp; &nbsp;
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

</body>

</html>