<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1 B</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1 class='text-center'> Ejercicio 1 - B) </h1>
    <?php
        function anidado(){
            $academia = array(
                array('ingles','basico',25,'intermedio',15,'avanzado',10),
                array('frances','basico',10,'intermedio',5,'avanzado',2),
                array('mandarin','basico',8,'intermedio',4,'avanzado',1),
                array('ruso','basico',12,'intermedio',8,'avanzado',4),
                array('portugues','basico',30,'intermedio',15,'avanzado',10),
                array('japones','basico',90,'intermedio',25,'avanzado',67),
            );
            return $academia;
        }
        function imprimir($academia){
                foreach($academia as $cursos)
            {
                echo <<< end
                        <table class="table table-bordered border-dark w-50 mt-3 m-auto text-center">
                        <tr class="bg-primary">
                            <th colspan="2" class="text-center text-capitalize">$cursos[0]</th>
                        </tr>
                end;
                for ($i=1; $i < count($cursos); $i++) 
                {
                    switch($cursos[$i]){
                        case 'basico':
                            echo '<tr class="table-success">';
                        break;
                        case 'intermedio':
                            echo '<tr class="table-warning">';
                        break;
                        case 'avanzado':
                            echo '<tr class="table-danger">';
                        break;
                    }
                    if(!is_numeric($cursos[$i]))
                    {
                        echo "<td class='text-capitalize'>$cursos[$i]</td>";
                    }
                    else{
                        echo "<td>$cursos[$i]</td>";
                        echo "</tr>";
                    }
                }
                echo '</table>';
            }
        }
        imprimir(anidado());

    ?>
</body>
</html>