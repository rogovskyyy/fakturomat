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
                <th>Edycja</th>
                <th>Usuń</th>
            </tr>
            @foreach ($models as $model)
                <tr>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->address }}</td>
                    <td>{{ $model->postcode }}</td>
                    <td>{{ $model->city }}</td>
                    <td>{{ $model->nip }}</td>
                    <td>
                        <a href="contractor/edit/{{$model->id}}"><button type="button" class="btn btn-success btn-sm" name="edit" value="{{$model->id}}">Edytuj</button></a>
                    </td>
                    <td>
                        <form action="contractor/delete" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" name="delete" value="{{$model->id}}">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@include('footer')
