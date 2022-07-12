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
            <td class="tg-0lax">Data wystawienia: 2015-01-01</td>
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
            <td>
                BARTOSZ ROGOWSKI <br />
                osiedle Bolesława Chrobrego 31b/20 <br />
                60-681 Poznań <br />
                NIP: 9721322655
            </td>
            <td>
                Centrum Rozwoju Edukacji EDICON sp. z o.o.<br />
                ul. Tadeusza Kościuszki 57 <br />
                61-891 Poznań <br />
                NIP: 7831728392</td>
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
                <td>{{ $row["cena_netto"] }} zł</td>
                <td>{{ $row["ilosc"] * $row["cena_netto"] }} zł</td>
                <td>
                    @if($row["vat"] == 0)
                        zw.
                    @else
                        {{ $row["vat"] }}%
                    @endif
                </td>
                <td>{{ $kwota_vat }} zł</td>
                <td>{{ $wartosc_netto + $kwota_vat }} zł</td>
            </tr>
        @endforeach
    </table> <br />
</body>
</html>
