<?php
/*
    Explicacion arrays:

  // ARRAY INDEXADO (usa indices y empieza en 0)
    $arrayIndexado = ["Lunes", "Martes", "Miércoles"];

    
    // ARRAY ASOCIATIVO (cada elemento tiene una clave personalizada)
    $arrayAsociativo = [
        "AAAA-MM" => ["mes", "importe", "estado" , "fecha"],
        "AAAA-MM" => ["mes", "importe", "estado" , "fecha"],
    ];

    // ARRAY MULTIDIMENSIONAL (arrays dentro de otros arrays)
    $arrayMultidimensional = [
        "socio1" => [
            "id" => ,
            "nombre" => "",
            "apellidos" => "",
            "dni" => "",
            "email" => "",
            "telefono" => "",
        ],
        "socio2" => [
             "id" => ,
            "nombre" => "",
            "apellidos" => "",
            "dni" => "",
            "email" => "",
            "telefono" => "",
        ]
    ];
*/

$socios = [
    1 => [
        "id" => 1,
        "nombre" => "Carlos",
        "apellidos" => "García López",
        "dni" => "12345678A",
        "email" => "carlos@example.com",
        "telefono" => "600123456",

        // PAGOS hechos
        "pagos" => [
            "2024-01" => ["mes" => "Enero", "importe" => 25, "estado" => "Pagado", "fecha" => "2024-01-05"],
            "2024-02" => ["mes" => "Febrero", "importe" => 25, "estado" => "Pendiente", "fecha" => null],
            "2024-03" => ["mes" => "Marzo", "importe" => 25, "estado" => "Pagado", "fecha" => "2024-03-10"],
            "2024-04" => ["mes" => "Abril", "importe" => 25, "estado" => "Pagado", "fecha" => "2024-04-06"],
            "2024-05" => ["mes" => "Mayo", "importe" => 25, "estado" => "Pendiente", "fecha" => null],
            "2024-06" => ["mes" => "Junio", "importe" => 25, "estado" => "Pagado", "fecha" => "2024-06-02"],
            "2024-07" => ["mes" => "Julio", "importe" => 25, "estado" => "Pagado", "fecha" => "2024-07-04"],
            "2024-08" => ["mes" => "Agosto", "importe" => 25, "estado" => "Pendiente", "fecha" => null],
            "2024-09" => ["mes" => "Septiembre", "importe" => 25, "estado" => "Pagado", "fecha" => "2024-09-03"],
            "2024-10" => ["mes" => "Octubre", "importe" => 25, "estado" => "Pagado", "fecha" => "2024-10-08"],
            "2024-11" => ["mes" => "Noviembre", "importe" => 25, "estado" => "Pendiente", "fecha" => null],
            "2024-12" => ["mes" => "Diciembre", "importe" => 25, "estado" => "Pagado", "fecha" => "2024-12-01"],
        ]
    ]
];

// Seleccionar el socio que queremos mostrar
$socio = $socios[1];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pagos del socio</title>

    <style>
        .pendiente {
            background-color: #ffb3b3;
        }

        table {
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 8px;
        }

        th {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>Datos del socio</h2>
<p><strong>Nombre:</strong> <?= $socio["nombre"] ?> <?= $socio["apellidos"] ?></p>
<p><strong>DNI:</strong> <?= $socio["dni"] ?></p>
<p><strong>Email:</strong> <?= $socio["email"] ?></p>
<p><strong>Teléfono:</strong> <?= $socio["telefono"] ?></p>
<h2>Pagos del año en curso</h2>

<table border="1">
    <tr>
        <th>Mes</th>
        <th>Importe</th>
        <th>Estado</th>
        <th>Fecha de pago</th>
    </tr>
    <?php
    $totalPagado = 0;

    foreach ($socio["pagos"] as $pago) {

        // Aplica color si el pago está pendiente
        $clase = ($pago["estado"] === "Pendiente") ? "pendiente" : "";

        // Sumar solo pagos completados
        if ($pago["estado"] === "Pagado") {
            $totalPagado += $pago["importe"];
        }
    ?>
        <tr class="<?= $clase ?>">
            <td><?= $pago["mes"] ?></td>
            <td><?= $pago["importe"] ?> €</td>
            <td><?= $pago["estado"] ?></td>
            <td><?= $pago["fecha"] ?? "-" ?></td>
        </tr>
    <?php } ?>
</table>

<p><strong>Total abonado:</strong> <?= $totalPagado ?> €</p>
</body>
</html>
