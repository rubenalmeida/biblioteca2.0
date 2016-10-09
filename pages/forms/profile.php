<?php include_once "../../menu.php"?>
<?php

include_once '../../administrador/livros/emprestimos/Emprestar.php';
?>

<?php


if(!empty($_GET['id_cliente'])){

  $profile = new Emprestar();

  $id_cliente = $_GET['id_cliente'];

  $emprestados = $profile->listarEmprestados($id_cliente);
  $profile->carregarPorId($id_cliente);
  $livros = $profile->listarLivros(); 
  $Hoje = date('d/m/y');

}


?>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Página do cliente
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Clientes</a></li>
        <li class="active">Página do cliente</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="http://localhost/biblioteca/dist/img/avatar5.png" alt="Foto padrao de clientes">

              <h3 class="profile-username text-center"><? echo $profile->getNome(); ?></h3>


              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Livros Emprestados</b> <a class="pull-right">10</a>
                </li>
              </ul>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informações</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#emprestimos" data-toggle="tab">Emprestimos</a></li>
              <li><a href="#livros" data-toggle="tab">Livros</a></li>
              <li><a href="#devolver" data-toggle="tab">Devolver</a></li>
            </ul>
            <div  class="tab-content">
                
              <div class="active tab-pane" id="emprestimos">
                  <form  class="form-horizontal" action="../../administrador/livros/emprestimos/processamento.php?acao=emprestar" method="post">

                      <input hidden="hidden" type="text" name="id_cliente" value="<? echo $_GET['id_cliente']; ?>" >

                    <div class="form-group">
                      <label>Livros</label>
                      <select class="form-control select2" multiple="multiple" name="id_livros[]" data-placeholder="Selecione um ou mais livros" style="width: 100%;">

                        <?php foreach ($livros as $dados){ ?>
                          <option value="<?php echo $dados['id_livros']; ?>"><b><?php echo $dados['nome']; ?></b></option>;

                        <?php } ?>
                        
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Data do emprestimo:</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" value="<? echo $Hoje ?>" readonly>
                      </div>
                      <!-- /.input group -->
                    </div>


                    <div class="form-group">
                      <label>Data da devolução:</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control pull-right" name="devolucao" id="devolucao" >
                      </div>
                      <!-- /.input group -->
                    </div>


                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Enviar</button>
                          </div>
                      </div>
                  </form>
              </div>
              <!-- /.tab-pane -->



              


              <div class="tab-pane" id="livros">


                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title"><b>Livros Emprestados</b></h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <td>Código</td>
                        <td>Nome</td>
                        <td>Dia do emprestimo</td>
                        <td>Dia da devolução</td>
                      </tr>
                      </thead>
                      <tfoot>
                      <tr>
                        <td>Código</td>
                        <td>Nome do livro</td>
                        <td>Dia do emprestimo</td>
                        <td>Dia da devolução</td>
                      </tr>
                      </tfoot>
                      <tbody>

                      <?php foreach ($emprestados as $dados){ 
                         if(date('d/m/Y', strtotime($dados['dia_devolucao'])) == $Hoje){
                           echo 
                        '<tr>

                          <td>' . $dados['id_livros'] . '</td>
                          <td>' . $dados['livro'] . '</td>
                          <td>' .  date('d/m/Y', strtotime($dados['dia_emprestimo'])) . '</td>
                          <td>' . date('d/m/Y', strtotime($dados['dia_devolucao'])) . '  <span class="label label-danger"> Hoje </span></td>
                        </tr>';
                             
                        }else{

                            echo 
                        '<tr>

                          <td>' . $dados['id_livros'] . '</td>
                          <td>' . $dados['livro'] . '</td>
                          <td>' .  date('d/m/Y', strtotime($dados['dia_emprestimo'])) . '</td>
                          <td>' . date('d/m/Y', strtotime($dados['dia_devolucao'])) . '</td>
                        </tr>';
                        }
                    
                    

                       } ?>
                        
                      </tbody>

                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>



              </div>

             


              <div class="tab-pane" id="devolver">
                <form class="form-horizontal">






                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>

                </form>

              </div>

            
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2016-2016 <a href="http://adoa.com.br">Adoa</a>.</strong>
  </footer>


<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script src="../../plugins/select2/select2.full.min.js"></script>

<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>