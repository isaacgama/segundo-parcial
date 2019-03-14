
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Dashboard Template · Bootstrap</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="css/estilos.css" rel="stylesheet">
</head>
<body>
  <?php require_once("includes/navbar.php");   ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Works</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-danger cancelar">Cancelar</button>
              <button type="button" class="btn btn-sm btn-outline-success" id="nuevo_registro">Nuevo</button>
            </div>
          </div>
        </div>
        <h2>Works</h2>
        <div class="table-responsive view" id="show_data">
          <table class="table table-striped table-sm" id="list-works">
            <thead>
              <tr>
                <th>Ruta Imagen</th>
                <th>Proyecto Nombre</th>
                <th>Diseño del Website</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <div id="insert_data" class="view">
          <form action="#" id="form_data">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="imagen">Ruta Imagen</label>
                  <input type="text" id="imagen" name="imagen" class="form-control">
                </div>
                <div class="form-group">
                  <label for="proyecto">Proyecto</label>
                  <input type="text" id="proyecto" name="proyecto" class="form-control">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="website">Website</label>
                  <input type="text" id="website" name="website" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-success" id="guardar_datos">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </main>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script>
    function change_view(vista = 'show_data'){
      $("#main").find(".view").each(function(){
        // $(this).addClass("d-none");
        $(this).slideUp('fast');
        let id = $(this).attr("id");
        if(vista == id){
          $(this).slideDown(300);
          // $(this).removeClass("d-none");
        }
      });

    }
    function consultar(){
      let obj = {
        "accion" : "consultar_works"
      };
      $.post("includes/_funciones.php", obj, function(respuesta){
        let template = ``;
        $.each(respuesta,function(i,e){
          template += `
          <tr>
          <td>${e.imgW}</td>
          <td>${e.prNameW}</td>
          <td>${e.WebW}</td>
          <td>
          <a href="#" data-id="${e.idW}">Editar</a>
          <a href="#" data-id="${e.idW}">Eliminar</a>
          </td>
          </tr>
          `;
        });
        $("#list-works tbody").html(template);
      },"JSON");
    }
    $(document).ready(function(){
      consultar();
      change_view();
    });
    $("#nuevo_registro").click(function(){
      change_view('insert_data');
    });

    $("#guardar_datos").click(function(guardar){
     // Funcion para guardar Datos
      let imagen = $("#imagen").val();
      let proyecto = $("#proyecto").val();
      let website = $("#website").val();
      // Inicializar el objetos
      let obj ={
        "accion" : "insertar_works",
        "imagen" : imagen,
        "proyecto" : proyecto,
        "website" : website
      }
      $("#form_data").find("input").each(function(){
        $(this).removeClass("has-error");
        if($(this).val() != ""){
          obj[$(this).prop("name")] =  $(this).val();
        }else{
          $(this).addClass("has-error").focus();
          return false;
        }
      });
      $.post("includes/_funciones.php", obj, function(verificado){ 
      if (verificado != "" ) {
       alert("Work Registrado");
        }
      else {
        alert("Work NO Registrado");
      } 
     }
     );
    });

    $("#main").find(".cancelar").click(function(){
      change_view();
      $("#form_data")[0].reset();
    });
  </script>
</body>
</html>