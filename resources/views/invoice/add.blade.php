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
            <table class="table">
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
                    <td><input type="text" name="name" class="form-control" placeholder="Ilość" aria-label="Last name"></td>
                    <td><input type="text" name="name" class="form-control" placeholder="Cena netto" aria-label="Last name"></td>
                    <td>123,00 zł</td>
                    <td>
                        <select class="form-control">
                            <option>zw.</option>
                            <option>0 %</option>
                            <option>5 %</option>
                            <option>8 %</option>
                            <option>23 %</option>
                        </select>
                    </td>
                    <td>123,00 zł</td>
                    <td>123,00 zł</td>
                </tr>
            </table>
            <button type="button" class="btn btn-danger btn-sm float-right">Dodaj</button>
            <button type="button" class="btn btn-success btn-sm float-right">Usuń</button>


        </form>
    </div>
</div>
<script>

</script>

@include('footer')
