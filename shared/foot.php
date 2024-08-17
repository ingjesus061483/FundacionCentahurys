</div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?=$empresa->valor." ".date('Y')?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="<?=$url?>/administracion/login.php" method="post">
                    <input type="submit" name="accion" value="Logout" class="btn btn-danger" />
                    </form>
                   
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=$url?>sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?=$url?>sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=$url?>sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=$url?>sb-admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=$url?>sb-admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=$url?>sb-admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=$url?>sb-admin/js/demo/datatables-demo.js"></script>
    <script> 
        var success="<?=isset($success)?$success:""?>";
        var message="<?=isset($message)?$message:""?>";
        if(success!=""){
            $( "#success" ).text( success).show().fadeOut( 3000 ); 
        }
        if(message!="")
        {
            $( "#error" ).text( message).show().fadeOut( 3000 );
        }
        $("#about").on( "submit", function( event ) {
          if ($("#nombre_about").val() === "" ) 
          {           
                $( "#error" ).text( "nombre no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }
          if (trim($("#valor_about").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }           
        });
        $("#objetive").on( "submit", function( event ) {
          if ($("#tipo_objective").val() === "" ) 
          {           
                $( "#error" ).text( "tipo objetivo no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }
          if (trim($("#descripcion_objetive").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }                    
        });
        $("#comunity").on( "submit", function( event ) {
          if ($("#img_comunity").val() === "" ) 
          {           
                $( "#error" ).text( "nombre no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }
          if ($("#fecha_comunity").val() === "" ) 
          {
            $( "#error" ).text( "fecha no valida" ).show().fadeOut( 3000 );
                event.preventDefault();
          }                    
        });
        $("#contact").on( "submit", function( event ) {
          if ($("#nombre_contact").val() === "" ) 
          {           
                $( "#error" ).text( "nombre no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          } 
          if (trim($("#valor_contact").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }                    
        });
        $("#usuario").on( "submit", function( event ) {
          if ($("#nombre_usuario").val() === "" ) 
          {           
                $( "#error" ).text( "nombre no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          } 
          if (trim($("#apellido_usuario").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }           
          if (trim($("#direccion_usuario").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }                    
          
          if (trim($("#telefono_usuario").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }   
          
          if (trim($("#email_usuario").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }   
          
          if (trim($("#user_usuario").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }                          
          if (trim($("#password_usuario").val()) === "" ) 
          {
            $( "#error" ).text( "valor no valido" ).show().fadeOut( 3000 );
                event.preventDefault();
          }                                      


        });
    </script>
   
</body>

</html>