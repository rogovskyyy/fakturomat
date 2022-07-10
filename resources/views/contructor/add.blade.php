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
            <h1>Dodawanie kontrahenta</h1><br /><br />
            <form action="/contractor/add" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <input type="text" name="name" class="form-control" placeholder="Nazwa kontrahenta" aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="number" name="nip" class="form-control" placeholder="NIP kontrahenta" aria-label="Last name" maxlength="11">
                    </div>
                </div> <br />
                <div class="row">
                    <div class="col-8">
                        <input type="text" name="address" class="form-control" placeholder="Adres kontrahenta" aria-label="Last name">
                    </div>
                    <div class="col">
                        <input type="text" name="postcode" class="form-control" placeholder="Kod pocztowy kontrahenta" aria-label="Last name">
                    </div>
                    <div class="col">
                        <input type="text" name="city" class="form-control" placeholder="Miejscowość kontrahenta" aria-label="Last name">
                    </div>
                </div> <br/>
                <div class="d-grid gap-1">
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success w-100">Dodaj</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-danger w-100">Anuluj</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@include('footer')
