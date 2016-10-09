<?php include_once"../../menu.php";
?>
<?php
include_once '../../administrador/livros/livros.php';

$livros = new Livros();

if(!empty($_GET['id_livros'] && $_GET['editora'] && $_GET['autor'])){
	$livros->carregarPorId($_GET['id_livros'], $_GET['editora'], $_GET['autor']);
}

$autor = $livros->recuperarAutores();
$editora = $livros->recuperarEditoras();
?>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" xmlns="http://www.w3.org/1999/html">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Cadsstro de livros e autores
                <small> Beta</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="http://localhost/biblioteca"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li><a href="#">Cadastro de livros e autores</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Livros</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="../../administrador/livros/processamento.php?acao=salvar" method="post" role="form">

                                <input type="hidden" name="id_livros" id="id_livros"  value="<?php echo $livros->getIdLivros();?>" />

                                <div class="form-group">
                                    <label for="nome_livro">Titulo do livro</label>
                                    <input type="text" class="form-control" name="nome" id="nome_livro"   value="<?php echo $livros->getNome(); ?>" />

                                </div>
                                <div id="erroNome"></div>

                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Autor</label>
                                    <select class="form-control select2"  name="id_autor" data-placeholder="Selecione um ou mais autores" style="width: 100%;">

                                        <?php foreach ($autor as $dados){ ?>
                                           <option value="<?php echo $dados['id_autor']; ?>" <?=($livros->getNomeAutor() == $dados['nome'])?'selected':''?>><?php echo $dados['nome']; ?></option>;

                                       <?php } ?>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Editora</label>
                                    <select class="form-control select2" name="id_editora" style="width: 100%;">
                                        <?php foreach ($editora as $dados){ ?>
                                            <option value="<?php echo $dados['id_editora']; ?>" <?=($livros->getNomeEditora() == $dados['nome'])?'selected':''?>><?php echo $dados['nome']; ?></option>;

                                        <?php }?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="quantidade">Total de unidades:</label>
                                    <input type="number" class="form-control" name="quantidade" id="quantidade"  placeholder="1(padrao)" value="<?php echo $livros->getQuantidade(); ?>" />
                                </div>
                                <!-- /.form-group -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar Livro</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.col -->

                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

            <!-- __________________________________CADASTRO DO AUTOR ______________________________________________-->


            <div class="row">
                <div class="col-md-6">

                    <div class="box box-danger" id="cad_autor">
                        <div class="box-header">
                            <h3 class="box-title">Cadastrar autor</h3>
                        </div>
                        <div class="box-body">
                            <!-- FORMULARIO -->

                          <form action="../../administrador/livros/processamento.php?acao=cad_autor" method="post" role="form">

                              <div class="form-group">

                                <label>Autor:</label>
                                  <input type="text" class="form-control" name="nome_autor" id="nome_autor" value="<? echo $livros->getNomeAutor(); ?>">

                            </div>
                              <div id="erroNome_autor"></div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cadastrar Autor</button>
                            </div>

                          </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->



                </div>
                <!-- /.col (left) -->
                <div class="col-md-6">

                    <!-- ___________________CADASTRO DA EDITORA___________________________________________________________________________ -->

                    <div class="box box-info" id="cad_editora">
                        <div class="box-header">
                            <h3 class="box-title">Cadastrar Editora</h3>
                        </div>
                        <div class="box-body">
                            <!-- Color Picker -->
                            <form action="../../administrador/livros/processamento.php?acao=cad_editora" method="post" role="form">
                                <div class="form-group">
                                    <label>Nome da editora:</label>
                                    <input type="text" class="form-control" name="nome_editora" id="nome_editora" value="<? echo $livros->getNomeEditora(); ?>">
                                </div>
                                <div id="erroNome_editora"></div>
                                <!-- /.form group -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar Editora</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (right) -->
</section>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Versão</b> 2.0.0
                </div>
                <strong>Copyright &copy; 2016-2016 <a href="http://adoa.com.br">Adoa</a>.</strong>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Other sets of options are available
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>





</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
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
<script>
    $(function(){
        $('#nome_livro').change(function(){
            $('#erroNome').load('../../administrador/livros/validacao.php?acao=verificarLivro&'+ $('#nome_livro').serialize());
        });
    });
</script>
<script>
    $(function(){
        $('#nome_autor').change(function(){
            $('#erroNome_autor').load('../../administrador/livros/validacao.php?acao=verificarAutor&'+ $('#nome_autor').serialize());
        });
    });
</script>
<script>
    $(function(){
        $('#nome_editora').change(function(){
            $('#erroNome_editora').load('../../administrador/livros/validacao.php?acao=verificarEditora&'+ $('#nome_editora').serialize());
        });
    });
</script>