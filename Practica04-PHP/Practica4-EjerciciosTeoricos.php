//PHP: variables, tipos, operadores, expresiones, estructuras de control

// Ejercicio 1

/*
<?php
function doble($i)
{
    return $i * 2;
}
$a = TRUE;
$b = "xyz";
$c = 'xyz';
$d = 12;
echo gettype($a);
echo gettype($b);
echo gettype($c);
echo gettype($d);
if (is_int($d)) {
    $d += 4;
}
if (is_string($a)) {
    echo "Cadena: $a";
}
$d = $a ? ++$d : $d * 3;
$f = doble($d++);
$g = $f += 10;
echo $a, $b, $c, $d, $f, $g;
?>
<?php
$i = 1;
while ($i <= 10) {
    print $i++;
}
?>
<?php
$i = 1;
while ($i <= 10):
    print $i;
    $i++;
endwhile;
?>
*/

/* Las variableEnCuestions y su tipo son: a - Booleano, b - String,
c - String, d - Entero, f - Entero, g - Entero.
*/

/* Los operadores son: = Asignacion, * Multiplicacion, += Suma y asignacion,
++ Incremento, ? : Operador ternario.
*/

/* Las funciones y sus parametros son: gettype() - variableEnCuestion,
is_int() - variableEnCuestion, is_string() - variableEnCuestion,
doble() - i.
*/

/* Las estructuras de control son: if, while.
*/

/* La salida en pantalla deberia ser:
booleanstringstringintegertrue, xyz, xyz, 17, 34, 44
*/

//Ejercicio 2

/* a) El ultimo codigo no es equivalentee a los primeros dos,
en ese caso la variable $i termina valiendo 10 en lugar de 11.
*/

// b) Son equivalentes.

// c) Son equivalentes.

//Ejercicio 3
/* a)
<html>

<head>
    <title>Documento 1</title>
</head>

<body>
    <?php
    echo "<table width = 90% border = '1' >";
    $row = 5;
    $col = 2;
    for ($r = 1; $r <= $row; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $col; $c++) {
            echo "<td>&nbsp;</td>\n";
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
    ?>
</body>

</html>
Esta pagina muestra una tabla de 5 filas y 2 columnas, con un borde de 1 pixel y un ancho del 90% del disponible, vacia.
*/

/* b)
<html>

<head>
    <title>Documento 2</title>
</head>

<body>
    <?php
    if (!isset($_POST['submit'])) {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Edad: <input name="age" size="2">
            <input type="submit" name="submit" value="Ir">
        </form>
        <?php
    } else {
        $age = $_POST['age'];
        if ($age >= 21) {
            echo 'Mayor de edad';
        } else {
            echo 'Menor de edad';
        }
    }
    ?>
</body>

</html>
Esta pagina muestra un formulario que pide la edad del usuario, y al enviar el formulario muestra si el usuario es mayor
o menor de edad.
*/

//Ejercicio 4
/* Las salidas del codigo seran:
El
El Clavel Blanco
Debido a que para el primer echo las variables $flor y $color no estan definidas.
*/


//PHP: arrays, funciones

// Ejercicio 1: Son equivalentes.

// Ejercicio 2:

/* a) La salida es:
barTrue
*/

/* b) La salida es:
6942
*/

/* c) La salida es:

*/

// Ejercicio 3:
/* a) La salida es:
Has entrado en esta pagina a las 20 horas, con 11 minutos y 30
segundos, del 18/05/2024
*/

/* b) La salida es:

5+6=11
*/