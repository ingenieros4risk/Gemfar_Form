<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible">
    <title>Reporte Completo Solicitudes</title>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Lista de proveedores Homologados</h2>

        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th>id</th>
                    <th>Fecha de Diligenciamiento</th>
                    <th>País Constitución</th>
                    <th>País(es) Comercialización</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Código solicitud (codsolicitud)</th>
                    <th>Fecha de Homologación</th>
                    <th>Responsable</th>
                    <th>Categorización</th>
                    <th>Due Diligence</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests_forms ?? '' as $data)
                <tr>
                  <td>{{ $data->id}}</td>
                  <th>09-04-2021</th>
                  <th>Colombia</th>
                  <th>Colombia, Perú</th>
                  <td>{{ $data->name}}</td>
                  <td>{{ $data->document}}</td>
                  <td>{{ $data->codsolicitud}}</td>
                  <td>{{ $data->date_homologation}}</td>
                  <td>RISK International</td>
                  <th>Global</th>
                  <th>No</th>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>