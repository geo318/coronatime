<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>
    table, tr, td, tbody, a, .img-cont {
        width:100%;
        max-width: 100%;
        display:block;
        margin: 0 auto;
    }
    @media only screen and (max-width: 700px) {
        .img-cont {
            margin:0 0 40px !important;
        }
        
        h1 {
            font-size: 20px !important;
            line-height: 24px !important;
            margin-bottom:8px !important;
        }
        
        p {
            font-size: 14px !important;
            line-height: 16px !important;
            margin-bottom: 24px !important;
        }
        a {
            font-size: 14px !important;
            line-height: 16px !important;
        }
    }
    tbody {width: 100%;}
    </style>
</head>
<body>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">

<!-- Email Body -->
<a class="img-cont">
    <img src="{{ asset('icons/mail.png') }}" class="logo" alt="coronatime">
</a>
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0" style="border: hidden !important;">
<table class="inner-body" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
