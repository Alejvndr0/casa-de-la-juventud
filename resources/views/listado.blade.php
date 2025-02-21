<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Listado de Inscritos</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Clase</th>
            <th>Fecha de Inscripción</th>
        </tr>
        @foreach ($inscripciones as $inscripcion)
            <tr>
                <td>{{ $inscripcion->nombre }}</td>
                <td>{{ $inscripcion->apellido }}</td>
                <td>{{ $inscripcion->email }}</td>
                <td>{{ $inscripcion->clase->nombre ?? 'N/A' }}</td>
                <td>{{ $inscripcion->fecha_inscripcion }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>




