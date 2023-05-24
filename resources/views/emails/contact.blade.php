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
    </tr>
    <tr>
        <td>{{$contact->name}}</td>
        <td>{{$contact->phone}}</td>
        <td>{{$contact->email}}</td>
        <td>{{nl2br($contact->message)}}</td>
    </tr>
</table>
