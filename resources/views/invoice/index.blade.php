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
        <h1>Dodaj fakture</h1><br /><br />
        <form action="{{ route('invoice.edit.post') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-4">
                    <input type="text" name="name" class="form-control" placeholder="Nazwa kontrahenta" aria-label="First name" value="{{$model->name}}">
                </div>
                <div class="col">
                    <input type="number" name="nip" class="form-control" placeholder="NIP kontrahenta" aria-label="Last name" maxlength="11" value="{{$model->nip}}">
                </div>
            </div> <br />
            <div class="row">
                <div class="col-8">
                    <input type="text" name="address" class="form-control" placeholder="Adres kontrahenta" aria-label="Last name" value="{{$model->address}}">
                </div>
                <div class="col">
                    <input type="text" name="postcode" class="form-control" placeholder="Kod pocztowy kontrahenta" aria-label="Last name" value="{{$model->postcode}}">
                </div>
                <div class="col">
                    <input type="text" name="city" class="form-control" placeholder="Miejscowość kontrahenta" aria-label="Last name" value="{{$model->city}}">
                </div>
            </div> <br/>
            <div class="d-grid gap-1">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-success w-100">Aktualizuj</button>
                        <input type="hidden" name="id"  value="{{$model->id}}">
                    </div>
                    <div class="col">
                        <a href="{{route('contractor.index')}}"><button type="button" class="btn btn-danger w-100">Anuluj</button></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@include('footer')
