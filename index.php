<?php  
    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <label for="parking">Parcheggio:</label>
        <input type="checkbox" name="parking" value="1">
        <label for="vote">Voto minimo:</label>
        <input type="number" name="vote" min="1" max="5">
        <input type="submit" value="Filtra">
    </form>

    <?php  
        $filtered_hotels = $hotels;

        if (isset($_GET['parking']) && $_GET['parking'] == '1') {
            $filtered_hotels = array_filter($filtered_hotels, function($hotel) {
                return $hotel['parking'] === true;
            });
        }

        if (isset($_GET['vote']) && is_numeric($_GET['vote'])) {
            $min_vote = (int)$_GET['vote'];
            $filtered_hotels = array_filter($filtered_hotels, function($hotel) use ($min_vote) {
                return $hotel['vote'] >= $min_vote;
            });
        }

        foreach ($filtered_hotels as $hotel) {
            echo "<h3>{$hotel['name']}</h3>";
            echo "<p>Descrizione:{$hotel['description']}</p>";
            echo "<p>Parcheggio:".($hotel['parking'] ? 'Si' : 'No')."</p>";
            echo "<p>Voto:{$hotel['vote']}</p>";
            echo "<p>Distanza:{$hotel['distance_to_center']}</p>";
        }
    ?>
</body>
</html>