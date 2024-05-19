<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Full calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>


    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/es.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-7">
                <div id="CalendarioWeb"></div>
            </div>
            <div class="col"></div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#CalendarioWeb').fullCalendar({
                header: {
                    left: 'today,prev,next', //aqui se agrega el boton que se crea
                    center: 'title',
                    right: 'month,basicWeek, basicDay, agendaWeek, agendaDay'

                },
                customButtons: { //creando boton personalizado en calendario
                    Miboton: {
                        text: "Boton 1",
                        click: function() {
                            alert("Accion del boton ");
                        }
                    }

                },
                dayClick: function(date, jsEvent, view) { //funcion para ver el dia que se selecciona al hacer click
                    $('#txtFecha').val(date.format());
                    $("#modalEventos").modal('show');

                },
                events: '../LoginMasterServe/eventos.php',

                eventClick: function(calEvent, jsEvent, view) {

                    $('#tituloEvento').html(calEvent.title);

                    $('#txtDescripcion').val(calEvent.descripcion);
                    $('#txtId').val(calEvent.Id);
                    $('#txtTitulo').val(calEvent.title);
                    $('#txtColor').val(calEvent.color);

                    FechaHora = calEvent.start._i.split(" ");
                    $('#txtFecha').val(FechaHora[0]);
                    $('#txtHora').val(FechaHora[1]);



                    $("#modalEventos").modal('show');
                },
                editable:true,
                eventDrop:function(calEvent){//haciendo la funcion para el drag en el calendario
                    $('#txtId').val(calEvent.Id);
                    $('#txtTitulo').val(calEvent.title);
                    $('#txtColor').val(calEvent.color);
                    $('#txtDescripcion').val(calEvent.descripcion);

                    var FechaHora=calEvent.start.format().split("T");
                    $('#txtFecha').val(FechaHora[0]);
                    $('#txtHora').val(FechaHora[1]);

                    RecolectarDatosGUI();
                    EnviarInformacion('modificar', NuevoEvento,true);
                }

            });
        });
    </script>
    <!-- Modaleventos(agreagr, modificar y eliminar) -->
    <div class="modal fade" id="modalEventos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloEvento"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div id="descripcionEvento"></div>
                    <input type="hidden" id="txtId" name="txtId">
                    <input type="hidden" id="txtFecha" name="txtFecha">
                    
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label>Título:</label>
                            <input type="text" id="txtTitulo" class="form-control" placeholder="Titulo de la solicitud" name="txtTitulo">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hora de la cita:</label>
                            <input type="text" id="txtHora" value="10:30" class="form-control" />
                        </div>
                        
                    </div>
                
                    <div class="form-group">
                        <label>Descripcion:</label>
                        <textarea id="txtDescripcion" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Color:</label>
                        <input type="color" value="#ff0000" id="txtColor" class="form-control" style="height:36px;">
                    </div>
                    


                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                    <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                    <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
                    <button type="button" class="btn btn-default" data-dimiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
    var NuevoEvento;
        $('#btnAgregar').click(function() {
            RecolectarDatosGUI();
            EnviarInformacion('agregar', NuevoEvento);
        });
        $('#btnEliminar').click(function() {
            RecolectarDatosGUI();
            EnviarInformacion('eliminar', NuevoEvento);
        });
        $('#btnModificar').click(function() {
            RecolectarDatosGUI();
            EnviarInformacion('modificar', NuevoEvento);
        });

        function RecolectarDatosGUI() {
            NuevoEvento = {
                Id:$('#txtId').val(),
                title: $('#txtTitulo').val(),
                start: $('#txtFecha').val() + " " + $('#txtHora').val(),
                end: $('#txtFecha').val() + " " + $('#txtHora').val(), 
                color: $('#txtColor').val(),
                textColor: "#FFFFFF",
                descripcion: $('#txtDescripcion').val()
            };
        }

        function EnviarInformacion(accion, objEvento,modal) {
            $.ajax({
                type: 'POST',
                url: '../LoginMasterServe/eventos.php?accion=' + accion, 
                data: objEvento, // Envía el objeto directamente
                success: function(msg) {
                    if (msg) {
                        $('#CalendarioWeb').fullCalendar('refetchEvents');
                        if(!modal){

    
                        $("#modalEventos").modal('toggle'); 
                        }
                    }
                },
                error: function() {
                    alert("hay un error");
                }
            });
        }
    </script>
</body>

</html>