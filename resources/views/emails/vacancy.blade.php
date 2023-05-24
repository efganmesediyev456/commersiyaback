<style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
</style>
<table id="customers">

    <tr>
        <th>Ad, soyad	</th>
        <th>Mobil nömrə		</th>
        <th>E–poçt		</th>
        <th>Mesaj		</th>
        <th>Vakansiya</th>
    </tr>
    <tr>
        <td>{{$vacancy->name}}</td>
        <td>{{$vacancy->phone}}</td>
        <td>{{$vacancy->email}}</td>
        <td>{{nl2br($vacancy->message)}}</td>
        <td><a href="{{env('APP_URL').'/'.app()->getLocale().'/vacancy/'.$vacancy->vacancy_id}}">Vakansiyaya Bax</a></td>
    </tr>
</table>
