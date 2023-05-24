<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');
    </style>
    <style>
        body
        {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            line-height: 20px;
        }
    </style>
    <![endif]-->
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]-->
    <title>METRO</title>
</head>
<body style="font-family: 'Inter', sans-serif;font-size: 14px;line-height: 20px;width: 100%;max-width: 600px;padding: 64px 32px;border:1px solid #E7E9ED">
<table  style="width:100%;max-width:600px;border-collapse: collapse;">
    <thead>
    <tr >
        <td style="width: 100%; text-align: center; padding-bottom: 32px">
            <img src="{{ $message->embed(public_path('frontend/images/metro.svg')) }}" width="200px"  alt="METRO">
        </td>
    {{--
    <tr>
        <td style="padding: 0 0 16px;line-height: 20px;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est facilis iste nulla sit. Asperiores assumenda
            delectus dolorum eos esse est et fuga laudantium necessitatibus nesciunt nisi pariatur quo, tempora? Porro?
        </td>
    </tr>
    --}}

    </thead>
</table>
<table style="width: 100%;max-width:600px;border-collapse: collapse;background: #FBFBFC">


    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98">
            A.S.A
        </td>
        <td style="padding: 16px;">
            {{$validated->name}} {{$validated->lastname}} {{$validated->father_name}}
        </td>
    </tr>

    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98">
            Cinsi
        </td>
        <td style="padding: 16px;">
            {{$validated->gender}}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98">
            Doğum günü
        </td>
        <td style="padding: 16px;">
            {{$validated->birthday}}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98">
            Ailə vəziyyəti / Övlad sayı
        </td>
        <td style="padding: 16px;">
            {{$validated->relation}} {{is_null($validated->children) ? '' : ' / ' . $validated->children }}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98">
            Doğulduğu yer
        </td>
        <td style="padding: 16px;">
            {{$validated->place_of_birth ?? "" }}
        </td>
    </tr>

    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Vətəndaşlıq
        </td>
        <td style="padding: 16px;">
            {{$validated->citizenship ?? "" }}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Qeydiyyat ünvanı
        </td>
        <td style="padding: 16px;">
            {{$validated->reg_address ?? "" }}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Yaşadığı faktiki ünvan
        </td>
        <td style="padding: 16px;">
            {{$validated->address ?? "" }}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Telefon
        </td>
        <td style="padding: 16px;">
            {{$validated->telephone ?? "" }}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Mobil nömrə
        </td>
        <td style="padding: 16px;">
            {{$validated->phone ?? "" }}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            E-poçt
        </td>
        <td style="padding: 16px;">
            {{$validated->email ?? "" }}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Təhsili <br/>
            <small style="font-size: 11px">Adı / Fakültə / Başlama / Bitirmə / Qeyd</small>
        </td>
        <td style="padding: 16px;">
            {!! $validated->education ?? ""  !!}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            İş təcrübəsi <br/>
            <small style="font-size: 11px">Adı / Vəzifə / Maaş / Başlama /  Çıxma / Səbəb</small>
        </td>
        <td style="padding: 16px;">
            {!! $validated->work_experience ?? ""  !!}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Sürücülük vəsiqəsi
        </td>
        <td style="padding: 16px;">
            {!! $validated->drive_license ?? ""  !!}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Xarici dil
        </td>
        <td style="padding: 16px;">
            {!! $validated->foreignLanguage ?? ""  !!}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Komputer bilikləri
        </td>
        <td style="padding: 16px;">
            {!! $validated->computerKnowledge ?? ""  !!}
        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            İş tələbləri
        </td>
        <td style="padding: 16px;">
            <table style="border-collapse: collapse;width: 100%">
                <tr style="border:1px solid #E7E9ED;">
                    <td style="width:50%;padding:6px;border:1px solid #E7E9ED;"><strong>İşin adı</strong></td>
                    <td style="width:50%;padding:6px;border:1px solid #E7E9ED;">{{$validated->work_name ?? "" }}</td>
                </tr>
                <tr style="border:1px solid #E7E9ED;">
                    <td style="width:50%;padding:6px;border:1px solid #E7E9ED;"><strong>Əmək haqqı</strong></td>
                    <td style="width:50%;padding:6px;border:1px solid #E7E9ED;">{{$validated->work_salary ?? "" }}</td>
                </tr>
                <tr style="border:1px solid #E7E9ED;">
                    <td style="width:50%;padding:6px;border:1px solid #E7E9ED;"><strong>Rejim</strong></td>
                    <td style="width:50%;padding:6px;border:1px solid #E7E9ED;">{{$validated->work_mode ?? "" }}</td>
                </tr>
            </table>




        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Sağlamlıq barədə məlumatlar
        </td>
        <td style="padding: 16px;">
            <table style="border-collapse: collapse;width: 100%">
                <tr style="border:1px solid #E7E9ED;">
                    <td style="width:70%;padding:6px;border:1px solid #E7E9ED;"><strong>Hərbi xidmət</strong></td>
                    <td style="width:30%;padding:6px;border:1px solid #E7E9ED;">{{$validated->army ?? "" }}</td>
                </tr>
                <tr style="border:1px solid #E7E9ED;">
                    <td style="width:70%;padding:6px;border:1px solid #E7E9ED;"><strong>Sağlamlıqla bağlı problem</strong></td>
                    <td style="width:30%;padding:6px;border:1px solid #E7E9ED;">{{$validated->health ?? "" }}</td>
                </tr>
                <tr style="border:1px solid #E7E9ED;">
                    <td style="width:70%;padding:6px;border:1px solid #E7E9ED;"><strong>Cinayət məsuliyyətinə cəlb olunma</strong></td>
                    <td style="width:30%;padding:6px;border:1px solid #E7E9ED;">{{$validated->crime ?? "" }}</td>
                </tr>
            </table>



        </td>
    </tr>
    <tr style="border:1px solid #E7E9ED;padding: 100px">
        <td style="width:50%;border:1px solid #E7E9ED;padding: 16px;color: #848B98;word-break: break-all">
            Digər məlumatlar
        </td>
        <td style="padding: 16px;">

            {{$validated->about ?? "" }}
        </td>
    </tr>

</table>

<table style="width: 100%;max-width:600px;margin-top: 40px">
    {{--
    <tr>
        <td style="padding: 40px 32px;font-size: 12px;line-height: 16px">
            Praesent orci congue diam ullamcorper nibh enim orci. Libero enim, nunc mattis sodales viverra. Aliquam ut ullamcorper adipiscing dignissim lectus nunc
            , a. Ullamcorper integer at eget mattis eleifend adipiscing. Volutpat eget faucibus purus id lacus.
        </td>
    </tr>
    --}}
    <tr >
        <td align="center">
                @if(setting('facebook')) <a href="{{ setting('facebook') }}" target="_blank"><i class="size20"><img alt="facebook" src="{{ $message->embed(public_path('frontend/images/svg-icons/sosial-2.svg')) }}"></i></a>@endif
                @if(setting('instagram')) <a href="{{ setting('instagram') }}" target="_blank"><i class="size20"><img alt="instagram" src="{{ $message->embed(public_path('frontend/images/svg-icons/sosial-5.svg')) }}"></i></a>@endif
                @if(setting('twitter')) <a href="{{ setting('twitter') }}" target="_blank"><i class="size20"><img alt="twitter" src="{{ $message->embed(public_path('frontend/images/svg-icons/sosial-1.svg')) }}"></i></a>@endif

        </td>
    </tr>
</table>
</body>
</html>


