<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 a)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1 class='text-center'> Ejercicio 1 - A) </h1>
    <?php
    function asociativo(){
        $acedemia = [
            'ingles'=>['basico'=>25,'intermedio'=>15,'avanzado'=>10],
            'frances'=>['basico'=>10,'intermedio'=>5,'avanzado'=>2],
            'mandarin'=>['basico'=>8,'intermedio'=>4,'avanzado'=>1],
            'ruso'=>['basico'=>12,'intermedio'=>8,'avanzado'=>4],
            'portugues'=>['basico'=>30,'intermedio'=>15,'avanzado'=>10],
            'japones'=>['basico'=>90,'intermedio'=>25,'avanzado'=>67],
        ];
        return $acedemia;
    }
    function imprimir($acedemia)
    {
        foreach($acedemia as $curso => $niveles)
        {
            echo <<< end
                <table class="table table-bordered border-dark w-50 mt-3 m-auto text-center">
                <tr class="bg-primary">
                    <th colspan="2" class="text-center text-capitalize">$curso</th>
                </tr>
            end;
            foreach($niveles as $nivel => $cupos){
                switch($nivel){
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
                echo <<< end
                        <td class="text-capitalize">$nivel</td>
                        <td>$cupos</td>
                    </tr>
                end;
            }
            echo '</table>';
        }
    }
    $academia = asociativo();
    imprimir($academia);
    ?>
</body>
</html>
