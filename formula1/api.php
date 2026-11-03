<?php

$numeros = [16, 44];

echo "<h1>Pilotos de Fórmula 1</h1>";

foreach ($numeros as $numero) {

    $curl = curl_init(); 

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.openf1.org/v1/drivers?session_key=latest&driver_number=" . $numero,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $codigo = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . htmlspecialchars($err);
    } elseif ($codigo != 200) {
        echo "<p>Error HTTP: " . $codigo . "</p>";
    } else {
        $pilotos = json_decode($response);

        if (empty($pilotos)) {
            echo "<p>No se han encontrado datos del piloto " . $numero . "</p>";
        } else {
            foreach ($pilotos as $piloto) {
                echo "<h2>" . htmlspecialchars($piloto->full_name) . "</h2>";
                echo "Número: " . $piloto->driver_number . "<br/>";
                echo "Equipo: " . htmlspecialchars($piloto->team_name) . "<br/>";
                echo "Siglas: " . htmlspecialchars($piloto->name_acronym) . "<br/>";

                if (!empty($piloto->headshot_url)) {
                    echo "<img src='" . htmlspecialchars($piloto->headshot_url) . "' width='150'>";
                }
            }
        }
    }
}