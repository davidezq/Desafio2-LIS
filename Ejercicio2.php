<?php
    session_start();
    //Expresiones regulares
    //autor: /[a-zA-Z]+,[a-zA-Z]+/ ó VARIOS AUTORES  AUTORES VARIOS
    //titulo: [^"]*
    //año de publicación: \([0-9]+\)
    //ISBN [0-9]{3}-[0-9]{1}-[0-9]{2}-[0-9]{6}-[0-9]{1}$
    
    //declarando clase libro
    class Libro{
        public function __construct($autor,$titulo,$N_edicion,$lugar_publicacion,$editorial,$año_edicion,$notas,$ISBN){
            $this->autor=$autor;
            $this->titulo=$titulo;
            $this->N_edicion = $N_edicion;
            $this->lugar_publicacion = $lugar_publicacion;
            $this->editorial = $editorial;
            $this->año_edicion = $año_edicion;
            $this->notas = $notas;
            $this->ISBN = $ISBN;
        }
        public $autor;
        public $titulo;
        public $N_edicion;
        public $lugar_publicacion;
        public $editorial;
        public $año_edicion;
        public $notas;
        public $ISBN;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row my-5">
            <div class="col">
                <h4>Libreria</h4>
                <hr>
                <div class="container d-flex">
                    <form class="row row-cols-sm-1 g-3 justify-content-center align-items-center mb-4 pb-2" method='post'>
                        <div class="col-12">
                            <div class="form-outline">
                            <label class="form-label" for="form1">Autor</label>
                            <input type="text" id="form1" class="form-control" name="autor" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-outline">
                            <label class="form-label" for="form1">Titulo</label>
                            <input type="text" id="form1" class="form-control" name="titulo" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-outline">
                            <label class="form-label" for="form1"># Edición</label>
                            <input type="text" id="form1" class="form-control" name="N_edicion" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-outline">
                            <label class="form-label" for="form1">Lugar de publicación</label>
                            <input type="text" id="form1" class="form-control" name="lugar_publicacion" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-outline">
                            <label class="form-label" for="form1">Editorial</label>
                            <input type="text" id="form1" class="form-control" name="editorial" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-outline">
                            <label class="form-label" for="form1">Año de publicacion</label>
                            <input type="text" id="form1" class="form-control" name="año_edicion" required/>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="notas" id="textarea_notas" placeholder="" style="height: 100px;" required></textarea>
                                <label for="textarea_notas">Notas</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-outline">
                                <label class="form-label" for="form1">ISBN</label>
                                <input type="text" id="form1" class="form-control" name="ISBN" required/>
                            </div>
                        </div>
                        <div class="col-62">
                            <button type="submit" class="btn btn-primary" name='submit'>Enviar</button>
                        </div>
                    </form>
                    <?php
                        //funciones para validar
                        function autorValido($autor){
                            $autor = trim($autor);
                            $regex1 = '/[a-zA-Z]+,[a-zA-Z]+/i';
                            $regex2 = 'VARIOS AUTORES';
                            $regex3 = 'AUTORES VARIOS';
                            if(preg_match($regex1,$autor) || $regex2==$autor || $regex3==$autor){
                                return 1;
                            }
                        }
                        function tituloValido($titulo){
                            $titulo = trim($titulo);
                            $regex = '/[^"]*/i';
                            return preg_match($regex,$titulo);
                        }
                        function edicionValida($edicion){
                            $edicion = trim($edicion);
                            return is_numeric($edicion);
                        }
                        function lugarValida($lugar){
                            $lugar = trim($lugar);
                            return strlen($lugar)>0 ? 1:0;
                        }
                        function editorialValida($editorial){
                            $editorial = trim($editorial);
                            return strlen($editorial)>0 ? 1:0;  
                        }
                        function añoValido($año){
                            $año = trim($año);
                            $regex = '/\([0-9]+\)/i';
                            return preg_match($regex,$año);
                        }
                        function notaValida($nota){
                            $nota = trim($nota);
                            return strlen($nota)>0 ? 1:0;
                        }
                        function isbnValido($isbn){
                            $isbn = trim($isbn);
                            $regex = '/[0-9]{3}-[0-9]{1}-[0-9]{2}-[0-9]{6}-[0-9]{1}$/i';
                            return preg_match($regex,$isbn);
                        }
                    ?>
                    <?php
                        if(!$_SESSION['libros']){
                            $_SESSION['libros'] = [];
                        }
                        //Obteniendo los campos del formulario
                        $autor = $_POST['autor'];
                        $titulo = $_POST['titulo'];
                        $edicion = $_POST['N_edicion'];
                        $lugar = $_POST['lugar_publicacion'];
                        $editorial = $_POST['editorial'];
                        $año = $_POST['año_edicion'];
                        $notas = $_POST['notas'];
                        $isbn = $_POST['ISBN'];

                        if(isset($_POST['submit'])){
                            //Validando TODAS las entradas
                            if(autorValido($autor) && tituloValido($titulo) && edicionValida($edicion) && lugarValida($lugar) && editorialValida($editorial) && añoValido($año) & notaValida($notas) &&  isbnValido($isbn))
                            {
                                $NuevoLibro = new Libro($autor,$titulo,$edicion,$lugar,$editorial,$año,$notas,$isbn);
                                array_push($_SESSION['libros'],$NuevoLibro);
                                echo <<< end
                                <div class="flex-fill bg-primary ms-3 w-100">
                                    <div class="accordion" id="accordionExample">
                                        
                                end;
                                foreach($_SESSION['libros'] as $libro)
                                {
                                    echo $ISBN;
                                    echo <<< end
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            $libro->titulo
                                        </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                        <li>autor: $libro->autor</li>
                                        <li>Lugar de publicación: $libro->N_edicion</li>
                                        <li>Editorial: $libro->editorial</li>
                                        <li>Año de publicación: $libro->año_edicion </li>
                                        <li>Nota: $libro->notas</li>
                                        <li>ISBN: $libro->ISBN</li>
                                        </div>
                                        </div>
                                    </div>
                                    end;
                                }             
                                
                                echo '</div>';
                                echo '</div>';      
                                /*                        </div>
                                            </div>
                                    </div>  
                                </div>*/
                            }
                            else{
                                echo 'falto algo';
                            }

                        }
                        
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>