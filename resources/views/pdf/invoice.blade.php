<html>
<head>
    <meta charset="UTF-8">
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
    <link type="text/css" href="css/bootstrap-grid.min.css" rel="stylesheet" />
    <link type="text/css" href="css/bootstrap-reboot.min.css" rel="stylesheet" />
    <link type="text/css" href="css/bootstrap-utilities.min.css" rel="stylesheet" />
    <style>
        *{ font-family: DejaVu Sans !important;}

        body {
            font-size: 10px;
        }
        td, tr {
            border: 1px solid black;
            border-collapse:separate;
            border-spacing:5em;
        }
        .invoice td {
            text-align: center;
        }

    </style>
</head>
<body>
    <br />
    <table class="table" style="width: 100%;">
        <thead>
        <tr>
            <td class="tg-0lax" colspan="2" rowspan="3">
                <img src="https://wilcity.com/wp-content/uploads/2018/12/sample-logo-design-png-3-2.png" style="display:block; width: 200px; height: 100px;">
            </td>
            <td class="tg-0lax" colspan="2"><center><b>Faktura nr FV 1/2015</b></center></td>
        </tr>
        <tr>
            <td class="tg-0lax">Data wystawienia: {{ $invoice_date }}</td>
            <td class="tg-0lax">Termin płatności: 10 dni</td>
        </tr>
        <tr>
            <td class="tg-0lax">Metoda płatności: przelew</td>
            <td class="tg-0lax">Na rachunek: 83 1020 4027 0000 1902 1190 7864</td>

        </tr>
        </thead>
    </table>
    <br /><br />
    <table class="table" style="width: 100%;">
        <tr>
            <td><b>Sprzedawca</b></td>
            <td><b>Nabywca</b></td>
        </tr>
        <tr>
            @php
                //print_r($contractor);
                //print_r($data);
                //die();
            @endphp
            <td>
                BARTOSZ ROGOWSKI <br />
                osiedle Bolesława Chrobrego 31b/20 <br />
                60-681 Poznań <br />
                NIP: 9721322655
            </td>
            <td>
                {{ $contractor->name }} <br />
                {{ $contractor->address }} <br />
                {{ $contractor->postcode }} {{ $contractor->city }} <br />
                NIP: {{ $contractor->nip }}
            </td>
        </tr>
    </table>
    <br /><br />
    <table class="table invoice" style="border: 1px solid black;">
        <tr style="text-align: center;">
            <th>Lp.</th>
            <th>Nazwa</th>
            <th>Miara</th>
            <th>Ilość</th>
            <th>Cena netto</th>
            <th>Wartość netto</th>
            <th>VAT %</th>
            <th>Kwota VAT</th>
            <th>Wartość brutto</th>
        </tr>
        @php
            $i = 1;
            $lacznie_brutto = 0;
        @endphp
        @foreach($data as $row)
            <tr>
                @php
                    //print_r($row);
                    //die();
                    $wartosc_netto = $row["ilosc"] * $row["cena_netto"];
                    $kwota_vat = ($wartosc_netto / 100) * $row["vat"];
                @endphp

                <td>{{ $i++ }}.</td>
                <td>{{ $row["nazwa"] }}</td>
                <td>{{ $row["miara"] }}</td>
                <td>{{ $row["ilosc"] }}</td>
                <td>{{ number_format((float) $row["cena_netto"], 2, '.', '') }} zł</td>
                <td>{{ number_format((float) $wartosc_netto, 2, '.', '') }} zł</td>
                <td>
                    @if($row["vat"] == 0)
                        zw.
                    @else
                        {{ $row["vat"] }}%
                    @endif
                </td>
                <td>{{ number_format((float) $kwota_vat, 2, '.', '') }} zł</td>
                <td>{{ number_format((float) $wartosc_netto + $kwota_vat, 2, '.', '') }} zł</td>
                @php
                    $lacznie_brutto += $wartosc_netto + $kwota_vat;
                @endphp
            </tr>
        @endforeach

    </table> <br /><br />
    @php
        $price = \App\Http\Controllers\PriceController::kwotaSlownie($lacznie_brutto);
    @endphp
    Do zapłaty : {{ number_format((float) $lacznie_brutto, 2, '.', '') }} zł<br />
    Kwota słownie: {{ $price }} <br />
    SPRZEDAWCA ZWOLNIONY PODMIOTOWO Z PODATKU OD TOWARÓW I USŁUG [dostawa towarów lub świadczenie usług zwolnione na podstawie art. 113 ust. 1 (albo ust. 9) ustawy z dnia 11 marca 2004 r. o podatku od towarów i usług (Dz.U. z 2016 r. poz. 710, z późn. zm.)]


</body>
</html>
