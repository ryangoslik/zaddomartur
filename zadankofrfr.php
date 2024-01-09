<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $user = "root";
    $pass = "";
    $dsn = "mysql:host=localhost;dbname=database1";
    try{
        $pdo = new PDO($dsn, $user, $pass);
        echo 'Połączenie nawiązane pomyślnie!';
    } catch (PDOException $e) {
        echo 'Błąd połączenia: ' . $e->getMessage();
        exit;
    }
    $pdo = null;
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=database1', 'root');
        $zapytanie = $pdo->query('SELECT nazwisko, imie, pesel FROM uczeń');
        foreach ($zapytanie as $wiersz) {
            echo $wiersz['nazwisko'] . ', '.$wiersz['imie']
            . '. ' . $wiersz['pesel'] . '<br>';
        }
        $pdo = null;
    } catch (PDOException $e) {
        echo "Błąd połączenia:" . $e->getMessage();
    }
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=database1', 'root');
        $dodaj = $pdo->exec("INSERT INTO uczeń (nazwisko, imie, pesel)
        Values('Bromek', 'Jan', '12345678912')");
        if ($dodaj > 0) {
            echo "Dodano: " . $dodaj . " wierszy<br>";
        }
        $pdo = null;
    } catch (PDOException $e) {
        echo "Błąd połączenia:" . $e->getMessage();
    }
    
    ?>
</body>
</html>