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
        <h1>Przeglądaj kontrahenta</h1><br /><br />
        <table class="table">
            <tr>
                <th>Nazwa kontrahenta</th>
                <th>Adres kontrahenta</th>
                <th>Kod pocztowy kontrahenta</th>
                <th>Miasto kontrahenta</th>
                <th>NIP kontrahenta</th>
                <th>Akcje</th>
            </tr>
            @foreach ($models as $model)
                <tr>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->address }}</td>
                    <td>{{ $model->postcode }}</td>
                    <td>{{ $model->city }}</td>
                    <td>{{ $model->nip }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include('footer')
