<?php 
    include('../db/dbconnect.php');
    //session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Card | Generate Cib </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="../../../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="../../../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Coustom StyleSheet -->
        <link rel="stylesheet" href="../../../css/style.css">
        <link rel="stylesheet" type="text/css" href="../../../css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="../../../css/select2.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <?php
            include("../database.php");
        ?>
        <!-- header logo: style can be found in header.less -->
        <?php include("../../../header.php");?>        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
             <?php include("../../../menu.php");?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Generate Cib File </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">cIB</a></li>
                        <li class="active">Generate Cib File</li>
                    </ol>
                </section>

<!-- style -->
<style type="text/css">
  .page_loader{
    position: absolute;
    z-index: 1;
    left: 27%;
    width: 37%;
  }
</style>
                <!-- style -->

                <!-- Main content -->
                <section class="content">
                  <img src="../img/loader.gif" class="page_loader" alt="Page loader">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="box">
                               <div class="box-header">
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                  <!-- from -->
                                   <div class="tile-body">
                                     <form id="defaultForm" class="form-horizontal" name="info" action="generate_cib_data.php" method="post" enctype="multipart/form-data">


                                      <div class="form-group row">
                                        <!-- <label class="control-label col-md-3">Select file </label> -->
                                        <div class="col-md-10">
                                          <select name="cib_date" class="form-control" id="cib_date">
                                            <option value="">--Select date --</option>
                                            <?php

                                          $sql_query = mysql_query("SELECT
                                                                       *
                                                                    from
                                                                       (
                                                                          SELECT
                                                                             year(reporting_date) as s_year,
                                                                             month(reporting_date) as s_month,
                                                                             reporting_date 
                                                                          from
                                                                             mis_table mt 
                                                                         /* where
                                                                             (
                                                                                status = 0 
                                                                                or status = '0' 
                                                                             )*/
                                                                             group by year(reporting_date),month(reporting_date)
                                                                       )
                                                                       s
                                                                    INNER JOIN (


                                                                    select
                                                                       * 
                                                                    from
                                                                       (
                                                                          SELECT
                                                                             year(reporting_date) as d_year,
                                                                             month(reporting_date) as d_month,
                                                                             reporting_date 
                                                                          from
                                                                             cl_table ct 
                                                                          /*where
                                                                             (
                                                                                status = 0 
                                                                                or status = '0' 
                                                                             )*/
                                                                             
                                                                            group by year(reporting_date),month(reporting_date)
                                                                           
                                                                       )
                                                                       d 
                                                                    ) t on s.s_year=t.d_year and s.s_month=t.d_month");

                                          while($result = mysql_fetch_array($sql_query))
                                          {
                                             $date = $result['s_year']."-".$result['s_month'];
                                            ?>
                                            <option value="<?php echo $date ?>"> <?php echo date('Y-M', strtotime($date)) ?> </option>

                                            <?php
                                          }

                                             ?>
                                            
                                            
                                          </select>
                                        </div>
                                      </div>

                                       <div class="tile-footer">
                                    <div class="row">
                                      <div class="col-md-8 col-md-offset-3">
                                        <button class="btn btn-primary" type="button" id="generatebtn"><i class="fa fa-fw fa-lg fa-check-circle"></i>Generate</button></div>
                                      </div>
                                    </div>
                                  </form>
                                  </div>

                                  <!-- from -->
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../../js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="../../../js/sweetalert.min.js"></script>
        <script src="../../../js/jquery-ui.js"></script>
        <script src="../../../js/select2.min.js"></script>


      <script>
      
      // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#cib_date').select2();
    });

    $('.page_loader').hide();

    $('#generatebtn').click(function(){
      var cib_date = $('#cib_date').val();
      if(cib_date !='')
      {

        $('#generatebtn').attr('disabled', true);
        swal({
                  title: "DO YOU WANT TO GENERATE THIS CIB INFO ??",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                })
                .then((yes)=>{

                  $('.page_loader').show();
                  if(yes)
                  {

                     $.ajax({
                  type:'post',
                  url:'cib_data_check.php',
                  data:{'cib_date': cib_date},
                  success:function(data)
                  {

                    if(data == 0)
                    {
                      //data create 

                      $.ajax({
                        type:'post',
                        url:'generate_cib_data.php',
                        data:{'cib_date': cib_date},
                        success:function(data)
                        {

                          swal(data)
                                      .then((value) => {

                                      location.reload();
                                      
                                      
                                    });
                          
                        }

                         });

                    }else{

                      swal({
                        title: data,
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                      })
                      .then((value) => {

                        if(value)
                        {

                          $.ajax({
                        type:'post',
                        url:'generate_cib_data.php',
                        data:{'cib_date': cib_date},
                        success:function(data)
                        {

                          swal(data)
                          .then((value) => {

                          location.reload();
                          
                          
                        });
                          
                        }

                         });

                        }else{
                          $('.page_loader').hide();

                        }
                       
                      
                      
                       });

                    }

                      
                    
                  }

                   });

                  }else{
                    $('.page_loader').hide();
                    $('#generatebtn').attr('disabled', false);

                  }
                 

                });
      }else{
        swal('PLEASE CONFIRM FILE IMPORT FIRST')
      }
    });
      
      
    </script>
    </body>
</html>