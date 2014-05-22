<title>Autentificacion UBB Sistema de Practicas</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Rut.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('#LoginForm_username').Rut({
  on_error: function(){ alert('Rut incorrecto'); }
});
})
</script>

<style type="text/css">
  body 
  {
    padding-top: 40px;
    padding-bottom: 40px;
  }

  .form-login 
  {
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    background-color:#FFCC33 ;
    border: 1px solid #e5e5e5;
    border-radius: 12px;
    box-shadow: 0 1px 2px rgba(0,0,0,.0.5);
  }

  .form-control
  {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
  }
  
  .text
  {
    color: #fff;
  }
  
  .izquierda
  {
    width: 300px;
    float: left;
    height: 65px;
  }

  .derecha
  {
    width: 700px;
    float: right;
  }
</style>
<div class="container">
  <div class="izquierda">
          
          <img src="<?php echo Yii::app()->baseUrl.'/images/Escudo.jpg'?>" width="244" height="58" border="0">
          </div>
          <div class="derecha">
          <h3>Sistema de Ayuda para Prácticas Profesionales<small> SAPP</small></h3>
          
          </div>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-9">
      <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Noticias</h3>
      </div>
      <div class="panel-body">
        <div class="bs-example bs-example-tabs">
          <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Requerimientos Práctica 1</a></li>
            <li><a href="#profile" data-toggle="tab">Requerimientos Práctica 2</a></li>
            <li class="dropdown">
              <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Carrera <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                <li><a href="#dropdown1" tabindex="-1" data-toggle="tab">IECI</a></li>
                <li><a href="#dropdown2" tabindex="-1" data-toggle="tab">ICINF</a></li>
              </ul>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="home">
              <br>
              <ul>
                  <li type="disc">Minimo 128 horas, correspondiente a 4 créditos. </li>
                  <li type="disc">Haber aprobado todas las asignaturas del plan curricular desde el semestre I al V.</li>
                  <li type="disc">Las inscripciones de práctica profesional serán analizadas por el docente
                                supervisor de prácticas profesionales y/o el Jefe de Carrera o Director de Escuela
                                quien recomendará aprobar, aprobar con
                                modificaciones o rechazar. </li>
                  <li type="disc">El alumno deberá elaborar un informe de práctica y entregar dos ejemplares en la
                  Jefatura de Carrera o Dirección de Escuela en un plazo de 60 días después de
                    finalizada ésta. </li>
                  <li type="disc">Calificación del Informe de Práctica Profesional, 60% de la nota final de
                      aprobación, a cargo del Docente Supervisor. Nota mínima de aprobación igual
                    a 60 puntos. </li>
                  <li type="disc">Calificación de la Pauta de Evaluación de Práctica de la empresa, 40% de la
                    nota final de aprobación, a cargo del Supervisor de la Empresa. Nota mínima
                    de aprobación igual a 70 puntos. </li>
                  <li type="disc"><a href="http://www.ubiobio.cl/miweb/webfile/media/32/Documentos/Reglamento-Practica-Profesional-%20ICI-IECI.pdf">Más Informaciones</a></li>
                  
              </ul>
            </div>
            <div class="tab-pane fade" id="profile">
              <br>
              <ul>
                  <li type="disc">Minimo 128 horas, correspondiente a 4 créditos. </li>
                  <li type="disc">Haber aprobado la asignatura Práctica Profesional I.</li>
                  <li type="disc">Las inscripciones de práctica profesional serán analizadas por el docente
                    supervisor de prácticas profesionales y/o el Jefe de Carrera o Director de Escuela
                    quien recomendará aprobar, aprobar con
                    modificaciones o rechazar. </li>
                  <li type="disc">El alumno deberá elaborar un informe de práctica y entregar dos ejemplares en la
                    Jefatura de Carrera o Dirección de Escuela en un plazo de 60 días después de
                    finalizada ésta. </li>
                  <li type="disc">Calificación del Informe de Práctica Profesional, 60% de la nota final de
                    aprobación, a cargo del Docente Supervisor. Nota mínima de aprobación igual
                    a 60 puntos. </li>
                  <li type="disc">Calificación de la Pauta de Evaluación de Práctica de la empresa, 40% de la
                    nota final de aprobación, a cargo del Supervisor de la Empresa. Nota mínima
                    de aprobación igual a 70 puntos. </li>
                  <li type="disc"><a href="http://www.ubiobio.cl/miweb/webfile/media/32/Documentos/Reglamento-Practica-Profesional-%20ICI-IECI.pdf">Más Informaciones</a></li>
            
              </ul>
            </div>
            <div class="tab-pane fade" id="dropdown1">
            <br>
              <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
            </div>
            <div class="tab-pane fade" id="dropdown2">
            <br>
              <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
      

    </div>
    <div class="col-xs-12 col-sm-4 col-md-3 form-login">
      <?php echo $content; ?>
    </div>
  </div>
</div>
