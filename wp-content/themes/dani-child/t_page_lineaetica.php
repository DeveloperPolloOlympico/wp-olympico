<?php
/*
Template Name: Página de línea Etica
*/

//get global prefix
$theId = dani_getId();

//get template header
get_header();
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>

body{
    background:none;
}

#advanced-search-form{
    background-color: #fff;
    max-width: 800px;
    margin: 5px auto 0;
    padding: 40px;
    color: #858b8e;
    box-shadow: 8px 8px 8px 8px rgba(0,0,0,0.1);
}

#advanced-search-form h2{
    padding-bottom: 20px;
    margin: 10px 20px;
    font-size: 24px;
}

#advanced-search-form hr{
    margin-top: 38px;
    margin-bottom: 54px;
    margin-left:3px;
    border: 1px solid #cccccc;

}

#advanced-search-form .form-group{
	margin-bottom: 20px;
    margin-left:20px;
	width: 30%;
    float:left;
    text-align: left;
}

#advanced-search-form .form-control{
    padding: 12px 20px;
    height: auto;
    border-radius: 2px;
}

#advanced-search-form .radio-inline{
    margin-left: 10px;
    margin-right: 10px;
}

#advanced-search-form .gender{
    width: 30%;
    margin-top: 30px;
    padding-left: 20px
    padding-top: 5px;
    padding-bottom: 5px;
}

#advanced-search-form .btn{
    width: 46%;
    margin: 20px auto 0;
    display: block;
    outline: none;
}

@media screen and (max-width: 800px){
    #advanced-search-form .form-group{
        width: 45%;
    }

    #advanced-search-form{
        margin-top: 0;
    }
}

@media screen and (max-width: 560px){
    #advanced-search-form .form-group{
        width: 100%;
        margin-left: 0;
    }

    #advanced-search-form h2{
        text-align: center;
    }
}
</style>
<div class="container" id="advanced-search-form">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-user"></i> Datos Básicos</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lugar de los hechos</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Hechos</a>
    </div>
    </nav>
    <form>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row">
                    <div class="form-group">
                        <label for="trepote">Tipo de Reporte:</label>
                        <select name="trepote" id="trepote">
                            <option value="">Acoso</option>
                            <option value="">Afectación del medio ambiente</option>
                            <option value="">Conflicto de Interés</option>
                            <option value="">Corrupción, Soborno y Fraude</option>
                            <option value="">Derechos humanos</option>
                            <option value="">Falsificación de documentos</option>
                            <option value="">Imagen Corporativa</option>
                            <option value="">Incumplimiento de Políticas y procedimientos</option>
                            <option value="">Información financiera fraudulenta</option>
                            <option value="">Irregularidades en contratación laboral</option>
                            <option value="">Lavado de Activos y Financiación al Terrorismo LA/FT</option>
                            <option value="">Malversación de activos</option>
                            <option value="">Pérdida de activos propios de la empresa, producto de fraudes internos y/o...</option>
                            <option value="">Prácticas comerciales en contra de los interes de la compañia</option>
                            <option value="">Protección de datos</option>
                            <option value="">Uso indebido de información confidencial</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="trepote">Tipo de vinculación:</label>
                        <select name="trepote" id="trepote">
                            <option value="">Cliente</option>
                            <option value="">Consultor o asesor</option>
                            <option value="">Empleado</option>
                            <option value="">Ex empleado</option>
                            <option value="">Proveedor</option>
                            <option value="">Tercero</option>
                        </select>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked onClick="muestra_oculta('contenido')"> 
                    <label class="form-check-label" for="flexRadioDefault1">
                        Anonimo
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" onClick="muestra_oculta('contenido')">
                    <label class="form-check-label" for="flexRadioDefault2">
                        No anonimo
                    </label>
                </div>
                <div id="contenido" >
                    <div class="form-group">
                        <label for="first-name">Nombre y apellidos</label>
                        <input type="text" class="form-control" placeholder="Nombre completo" id="first-name">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Tipo de documento</label>
                        <input type="text" class="form-control" placeholder="CC/NIT/PP" id="last-name">
                    </div>
                    <div class="form-group">
                        <label for="country">Número de documento</label>
                        <input type="text" class="form-control" placeholder="#documento" id="country">
                    </div>
                    <div class="form-group">
                        <label for="number">Teléfono de contacto</label>
                        <input type="text" class="form-control" placeholder="Phone number" id="number">
                    </div>
                    <div class="form-group">
                        <label for="age">Correo electrónico</label>
                        <input type="text" class="form-control" placeholder="Digite email" id="age">
                    </div>
                    
                    <div class="clearfix"></div>
                </div>
                <!--<button type="submit" class="btn btn-info btn-lg btn-responsive" id="search"> <span class="glyphicon glyphicon-search"></span> Search</button>-->
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
        </div>
        <ul class="pager wizard" style="list-style:none; ">
            <li class="next">
                <button class="btn btn-info btn-cons pull-right" type="button">
                    <span>Siguiente <span class="fa fa-angle-right"></span></span>
                </button>
            </li>
            <li class="next finish" style="display:none;">
                <button class="btn btn-info btn-cons pull-right finish" type="button" style="">
                    <span>Terminar <span class="fa fa-check"></span></span>
                </button>
            </li>
            <li class="previous first" style="display:none;">
                <button class="btn btn-white pull-right m-r-10" type="button">
                    <span><span class="fa fa-refresh"></span> Primero</span>
                </button>
            </li>
            <li class="previous" style="display:none;">
                <button class="btn btn-white pull-right m-r-10" type="button">
                    <span><span class="fa fa-angle-left"></span> Anterior</span>
                </button>
            </li>
        </ul>
    </form>
</div>
<script type="text/javascript">
    function muestra_oculta(id){
            if (document.getElementById){ //se obtiene el id
                var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
                el.style.display = (el.style.display == 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
            }
        }
        window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
            muestra_oculta('contenido');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
        }
</script>
<br><br><br><br><br><br><br>
<?php get_footer(); ?>
