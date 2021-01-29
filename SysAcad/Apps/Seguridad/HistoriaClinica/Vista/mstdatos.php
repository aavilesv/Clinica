<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <title>Generar Historia clinica</title>
        <link href="../css/cabeceraj.css" rel="stylesheet" type="text/css"/>
   
       
        <style type="text/css">
        #cabecera{
            background:white;
            padding:20px;
        
        }
      
        </style>
    </head>
    <body>
        
     
        <div id="cabecera" class="cn">
            <img class="lf"  src="../imagenes/iconomedicina.jpg" alt=""/>   <img class="rg" src="../imagenes/img_logo_unemi_login.png" alt=""/>
     <?php
     if(isset($_POST['titulo'])):
             if($_POST['titulo']){ ?>
         <h1 aling="center"> <?=
            $_POST['titulo']?>
        </h1>
         <?php ;}   
         else{?> 
         <h1 >Nombre de la institucion</h1>
         <?php ;} ?>
       <?php endif; ?>
   
    </div>
           
      
       
            <div>
<TABLE  BORDER="2"  CELLPADDING=10 CELLSPACING=0>
    <tr> <td class="prdtos" > <div >
          <?php if(isset($_POST['nomMedico'])):
             if($_POST['nomMedico']){ ?>
                <span class="negrita"> NOMBRE DEL DOCTOR: </span><span class="normal">Dr. <?=
            $_POST['nomMedico']?></span>
          <?php ;}   
         else{?>  
                <span class="negrita">NOMBRE DOCTOR:</span>
         <?php ;} ?>
       <?php endif; ?><br>
        <?php if(isset($_POST['cedulaMedico'])):
             if($_POST['cedulaMedico']){ ?>
       <span class="negrita"> N° CEDULA: </span><span class="normal"><?=
            $_POST['cedulaMedico']?>
        </span>
         <?php ;}   
         else{?> 
       <span class="negrita">N° CEDULA:</span>
         <?php ;} ?>
       <?php endif; ?>
         
   
            </div></td> <td class="prdtos" ><div >
            <?php if(isset($_POST['nomPaciente'])):
             if($_POST['nomPaciente']){ ?>
       <span class="negrita"> PACIENTE:</span><span class="normal"> <?=
            $_POST['nomPaciente']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">NOMBRE DEL PACIENTE:</span>
         <?php ;} ?>
       <?php endif; ?><br>
         <?php if(isset($_POST['nh'])):
             if($_POST['nh']){ ?>
                     <span class="negrita">  N° HISTORIA CLINICA:</span><span class="normal"> <?=
            $_POST['nh']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita" >N° HISTORIA CLINICA:</span>
         <?php ;} ?>
        
       <?php endif; ?>
    </div></td>  </tr>
    <tr > <td   class="htclc" >
                 <div >
                    <?php if(isset($_POST['nficha'])):
             if($_POST['nficha']){ ?>
                     <span class="negrita">  N° FICHA MEDICA:</span><span class="normal"> <?=
            $_POST['nficha']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita" >N° FICHA MEDICA:</span>
         <?php ;} ?>
        
       <?php endif; ?>
     <br>
        <?php if(isset($_POST['antecedentes'])):
             if($_POST['antecedentes']){ ?>
         <span class="negrita" > ANTECEDENTES:</span> <span class="normal"> <?=
            $_POST['antecedentes']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita" >ANTECEDENTES:</span>
         <?php ;} ?>
       <?php endif; ?> 
        
                 </div> 
        </td>
        <td class="htclc">
                               <div >
          <?php if(isset($_POST['alergias'])):
             if($_POST['alergias']){ ?>
            <span class="negrita">  ALERGIAS:</span><span class="normal"> <?=
            $_POST['alergias']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">ALERGIAS:</span>
         <?php ;} ?>
       <?php endif; ?> <br>
        <?php if(isset($_POST['familiares'])):
             if($_POST['familiares']){ ?>
         <span class="negrita"> FAMILIARES:</span> <span class="normal"> <?=
            $_POST['familiares']?>
        </span>
         <?php ;}   
         else{?>
         <span class="negrita">FAMILIARES:</span>
         <?php ;} ?>
       <?php endif; ?> 
   
    </div>
                              
                    
    </td>  </tr>
    <tr> <td class="psal"><div >
          <?php if(isset($_POST['peso'])):
             if($_POST['peso']){ ?>
                <span class="negrita">  PESO:</span><span class="normal"> <?=
            $_POST['peso']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">PESO:</span>
         <?php ;} ?>
       <?php endif; ?><br>
        <?php if(isset($_POST['alt'])):
             if($_POST['alt']){ ?>
       <span class="negrita"> ALTURA:</span><span class="normal"> <?=
            $_POST['alt']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">ALTURA:</span>
         <?php ;} ?>
       <?php endif; ?> 
   
            </div></td> <td class="psal"><div >
                    
          <?php if(isset($_POST['puls'])):
             if($_POST['puls']){ ?>
                    <span class="negrita">  GRUPO SANGUINEO: </span><span class="normal"><?=
            $_POST['puls']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">GRUPO SANGUINEO:</span>
         <?php ;} ?>
       <?php endif; ?><br>
        <?php if(isset($_POST['temp'])):
             if($_POST['temp']){ ?>
       <span class="negrita"> ALERGIAS:</span><span class="normal"> <?=
            $_POST['temp']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">ALERGIAS:</span>
         <?php ;} ?>
         <?php endif; ?> 
         <br>
        <?php if(isset($_POST['resp'])):
             if($_POST['resp']){ ?>
       <span class="negrita"> RESPIRACIÓN:</span><span class="normal"> <?=
            $_POST['resp']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">RESPIRACIÓN:</span>
         <?php ;} ?>
         
       <?php endif; ?> 
   
           </div></td>  </tr>
            <tr> <td   COLSPAN=2><div >
          <?php if(isset($_POST['consulta'])):
             if($_POST['consulta']){ ?>
               <span class="negrita">  CONSULTA:</span><span class="normal"> <?=
            $_POST['consulta']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">CONSULTA:</span>
         <?php ;} ?>
       <?php endif; ?>
       
   
    </div></td>  </tr>
       <tr> <td   COLSPAN=2><div >
          <?php if(isset($_POST['receta'])):
             if($_POST['receta']){ ?>
                   <span class="negrita">  RECETA:</span><span class="normal"> <?=
            $_POST['receta']?>
        </span>
         <?php ;}   
         else{?> 
         <span class="negrita">RECETA:</span>
         <?php ;} ?>
       <?php endif; ?>
        
   
    </div></td>  </tr>
</TABLE>
</div>

        
        <div class="possicion">
            
        <h5><img class="escudo" src="../../../../img/logo2.png"  alt=""/> </h5>
        
        </div> <br><br>
        
        <h5> FIRMA.</h5>
</body>
</html>

