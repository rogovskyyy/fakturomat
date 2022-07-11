@include('header')

<div id="content">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><i class="zmdi zmdi-notifications text-danger"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <h1>Dodawanie faktury</h1><br /><br />
        <form action="/invoice/add" method="post">
            @csrf
                <div class="row">
                    <div class="col-6">
                        Kontrahent:
                        <select name="name" class="form-control" placeholder="Nazwa kontrahenta" aria-label="First name">
                            @foreach($contractors as $p)
                                <option>{{$p->name}}, {{$p->address}} (NIP : {{$p->nip}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        Data wystawienia:
                        <input type="date" name="name" class="form-control" placeholder="Nazwa kontrahenta" aria-label="First name">
                    </div>
                </div> <br />
            <table class="table" id="table">
                <tr>
                    <th>Nazwa</th>
                    <th>Miara</th>
                    <th>Ilość</th>
                    <th>Cena netto</th>
                    <th>Wartość netto</th>
                    <th>VAT %</th>
                    <th>Kwota VAT</th>
                    <th>Wartość brutto</th>
                </tr>
                <tr>
                    <td><input type="text" name="name" class="form-control" placeholder="Nazwa usługi" aria-label="Last name"></td>
                    <td>
                        <select class="form-control">
                            <option>szt.</option>
                            <option>rg.</option>
                        </select>
                    </td>
                    <td><input type="text" id='ilosc' name="name" class="form-control" placeholder="Ilość" aria-label="Last name"></td>
                    <td><input type="text" id='cena_netto' name="name" class="form-control" placeholder="Cena netto" aria-label="Last name"></td>
                    <td><div id="wartosc_netto">0,00</div></td>
                    <td>
                        <select class="form-control" id="vat">
                            <option value="0">zw.</option>
                            <option value="0">0 %</option>
                            <option value="5">5 %</option>
                            <option value="8">8 %</option>
                            <option value="23">23 %</option>
                        </select>
                    </td>
                    <td><div id="kwota_vat">0,00 zł</div></td>
                    <td><div id="wartosc_brutto">0,00 zł</div></td>
                </tr>
            </table>
            <button type="button" class="btn btn-danger btn-sm float-right">Dodaj</button>
            <button type="button" class="btn btn-success btn-sm float-right">Usuń</button>


        </form>
    </div>
</div>
<script>

    function refresh_table() {
        let x = 0;
        $('#table tr').each(function() {
            if(x == 0) { }
            else {
                // Pełna lista TD
                let data = $(this).find('td').each (function() { });

                let ilosc = $('#ilosc').val();
                let cena_netto = $('#cena_netto').val();
                let wartosc_netto = parseFloat(ilosc * cena_netto).toFixed(2);
                $('#wartosc_netto').text(wartosc_netto + " zł");

                let vat = $('#vat').val();

                let kwota_vat = parseFloat((wartosc_netto / 100) * vat).toFixed(2);

                $('#kwota_vat').text(kwota_vat + " zł")

                let total = parseFloat(wartosc_netto) + parseFloat(kwota_vat);
                let wartosc_brutto = parseFloat(total).toFixed(2);
                $('#wartosc_brutto').text(wartosc_brutto + " zł");
            }
            x++;
        });
    }

    $( document ).ready(function() {
        refresh_table();
    });

    $('#table').on('change', 'input', function() {
        refresh_table();
    });

    $('#vat').on('change', function() {
        refresh_table();
    })

</script>

@include('footer')
