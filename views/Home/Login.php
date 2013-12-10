<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              
        <link rel="stylesheet" type="text/css" href="resources/css/start/jquery-ui-1.10.3.custom.min.css"/>
        <link rel="stylesheet" type="text/css" href="resources/css/template.login.css"/>
        
        <script type="text/javascript" src="resources/js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="resources/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script type="text/javascript" src="resources/js/template.default.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#btnIngresar-btn").button({ icons: { primary: "ui-icon-check"} });
                $("#btnCancelar-btn").button({ icons: { primary: "ui-icon-cancel"} }); 
                
                $( "#mensaje" ).dialog({
                    closeOnEscape: true,
                    show: 'fade',
                    hide: 'fade',
                    open: function(event, ui){
                        setTimeout("$('#mensaje').dialog('close')",3000);
                    },
                    position: { 
                        at: "right top", 
                        of: window
                    },
                    buttons: [
                        {
                            text: "OK",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]
                });
            });
        </script>
        <title>SIRALL2</title>  
    </head>
    <body>
        <?php if(isset($mensaje)) { ?>
        <div id="mensaje" title="Mensaje"><p><?php echo $mensaje; ?></p></div>
        <?php } ?>
        <section>
            <form class="dvSectionWrapper" action="?controller=Home&action=LoginPOST" method="POST">
                <header>
                    <img src="resources/images/essalud_logo.png">
                </header>
                <article>
                    <p><label for="txtUsername">Nombre de Usuario:</label></p>
                    <p><input id="txtUsername" type="text" name="username" /></p>
                    <p><label for="txtPassword">Clave:</label></p>
                    <p><input id="txtPassword" type="password" name="password" /></p>
                </article>
                <footer>
                    <button id="btnIngresar-btn" type="submit">Ingresar</button>
                    <button id="btnCancelar-btn" type="reset">Cancelar</button>
                </footer>
            </form>
        </section>
    </body>
</html>