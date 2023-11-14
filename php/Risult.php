<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/display.css">
    <title>Display</title>
</head>
<body>
    
    <h2>Displaying Data</h2>
    <form method="post">
        <div class="form-box">
            <div class="form-value">
                <form>
                    <div class="inputbox">
                        <select name="query_display" id="query-display">
                            <option value="tutto">Search through all data</option>
                            <option value="ricerca_per_autore">Search through author names</option>
                            <option value="ricerca_per_nome_libro">Search through book names</option>
                            <option value="ricerca_per_isbn">Search through isbn</option>
                        </select>
                        <input type="text" name="bar" id="bar" placeholder="s     e     a     r     c     h          w     h     a     t          y     o     u          w     a     n     t">
                    </div>
                    <input type="submit" id="submit" name="submit" value="search">
                </form>
            </div>
        </div>        
    </form>

    <?php
        include "db_conn.php";   
        
        if (isset($_POST["submit"])){

            $query_display=$_POST['query_display'];
            $search_term = $_POST['bar'];
            $sql = "";

            if ($query_display == 'tutto') {
                $sql = "SELECT * FROM libri l
                    JOIN scritti s ON l.cod_isbn = s.cod_isbn
                    JOIN autori a ON s.id_autore = a.id_autore
                    WHERE l.titolo LIKE '%$search_term%' OR a.nome LIKE '%$search_term%' OR a.cognome LIKE '%$search_term%' or l.cod_isbn like '%$search_term%'";
            } elseif ($query_display == 'ricerca_per_autore') {
                $sql = "SELECT * FROM autori a
                    JOIN scritti s ON a.id_autore = s.id_autore
                    JOIN libri l ON s.cod_isbn = l.cod_isbn
                    WHERE a.nome LIKE '%$search_term%' OR a.cognome LIKE '%$search_term%'";
            } elseif ($query_display == 'ricerca_per_nome_libro') {
                $sql = "SELECT * FROM libri l
                    JOIN scritti s ON l.cod_isbn = s.cod_isbn
                    JOIN autori a ON s.id_autore = a.id_autore
                    WHERE l.titolo LIKE '%$search_term%'";
            } elseif ($query_display == 'ricerca_per_isbn') {
                $sql = "SELECT * FROM libri l
                    JOIN scritti s ON l.cod_isbn = s.cod_isbn
                    JOIN autori a ON s.id_autore = a.id_autore
                    WHERE l.cod_isbn LIKE '%$search_term%'";
            }
    
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                echo "<div class= 'cards'>";
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="card">
                        <img src="../pics/onnn.png" alt="">
                        <div class="innerdata">
                            <p>Title: <?php echo $row["titolo"]; ?></p>
                            <p>Author: <?php echo $row["nome"] . " " . $row["cognome"]; ?></p>
                            <p>ISBN: <?php echo $row["cod_isbn"]; ?></p>
                            <p>Price: € <?php echo $row["prezzo"]; ?></p>
                            <p>Publishing House: <?php echo $row["casa_ed"]; ?></p>
                        </div>
                    </div>
                    <?php
                }
                echo "<\div>";
            } else {
                echo "0 results";
            }

        }
        
        $conn->close();

    ?>
</body>
</html>