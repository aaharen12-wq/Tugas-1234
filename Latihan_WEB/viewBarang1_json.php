 <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th {
            background-color: greenyellow;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid;
        }

        tr:nth-child(odd) {
            background-color: gray;
        }

        tr:nth-child(even) {
            background-color: white;
        }

        tr:hover {
            background-color: red;
            transition: 0.3s;
        }
    </style>

<?php
define('FILE_JSON', 'peserta.json');

function cekFileJson() {
    if (!file_exists(FILE_JSON)) {
        file_put_contents(FILE_JSON, json_encode([]));
    }
    $json = file_get_contents(FILE_JSON);
    return json_decode($json, true);
}

$data_peserta = cekFileJson();
$total_data = count($data_peserta);

if ($total_data == 0) {
    echo "<table>
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>email</th>
                <th>hp</th>
                <th>alamat</th>
            </tr>";
    echo "</table>";
    echo "<div style='text-align: center; margin-top: 20px;'>
            <button onclick=\"window.location.href='formbarang.html';\">Back</button>
          </div>";

} else {
    echo "<table>
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>email</th>
                <th>hp</th>
                <th>alamat</th>
            </tr>";

    for ($i = 0; $i < $total_data; $i++) {
        $peserta = $data_peserta[$i];
        echo "<tr>
                <td>" . ($i + 1) . "</td>
                <td>" . htmlspecialchars($peserta['nama']) . "</td>
                <td>" . htmlspecialchars($peserta['email']) . "</td>
                <td>" . htmlspecialchars($peserta['hp']) . "</td>
                <td>" . htmlspecialchars($peserta['alamat']) . "</td>
              </tr>";
    }

    echo "</table>";

    echo "<div style='text-align: center; margin-top: 20px;'>
            <button onclick=\"window.location.href='formpeserta.html';\">Back</button>
          </div>";
}
?>