<?php
    $mysqli = new mysqli("localhost", "Sebastian", "ifuseekamy", "jardinabuela");
    $result = $mysqli->query('SELECT COUNT(*) as total_products FROM productos');
    $row = $result->fetch_assoc();
    $num_total_rows = $row['total_products'];
    $num_pages = ceil($num_total_rows / 4);

    //Si hay registros
if ($num_total_rows > 0) {
    $result = $mysqli->query(
        'SELECT COUNT(*) as total_products FROM productos
        ORDER BY idproducto DESC
        LIMIT 0, 4'
    );
    if ($result->num_rows > 0) {
        echo '<ul class="row items">';
        while ($row = $result->fetch_assoc()) {
            echo '<li class="col-lg-4">';
            echo '<div class="item">';
            echo '<h3>'.$row['name'].'</h3>';
            echo '</div>';
            echo '</li>';

        }
        echo '</ul>';
    }
}
 ?>