<?php
session_start();
?>
<html>
    <head>
        <title>
            Search form timeline
        </title>
        <!--bootstrap-->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- css style-->
        <link rel="stylesheet" href="style.css">
        <!--font awesome-->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    </head>
<body>
<?php
require_once ('class.php');
$timeClass= new TimeLine();
if(isset($_GET['page'])){
    $servicePage=$timeClass->getPage($_GET['page']);
}
else{
    $servicePage=$timeClass->getPage(1);

}

?>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="page-header">
            <h1 id="timeline" align="center">Timeline</h1>
        </div>
        <ul class="timeline">
            <?php
            $sort = array();
            $i=0;
            foreach($servicePage['service'] as $k=>$v) {
                    if($i%2==0){ ?>
                        <li>
                            <div class="timeline-badge"></div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                </div>
                                <div class="timeline-body">
                                    <p> <?php echo  $sort['msg'][$k]=$v['msg'];?> </p>
                                    <p align="right"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php echo $sort['date'][$k] = $v['date'];?></small></p>
                                </div>
                            </div>
                        </li>
                     <?php }
                     else { ?>
                         <li class="timeline-inverted">
                             <div class="timeline-badge warning"></i></div>
                             <div class="timeline-panel">
                                 <div class="timeline-heading">
                                     <h4 class="timeline-title">Mussum ipsum cacilds</h4>
                                 </div>
                                 <div class="timeline-body">
                                     <p> <?php echo  $sort['msg'][$k]=$v['msg'];?> </p>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <button type="button" class="btn btn-info"><small>Read more</small></button>
                                         </div>
                                         <div class="col-md-6" align="right">
                                             <small  class="text-muted"><i class="glyphicon glyphicon-time"></i> <?php echo $sort['date'][$k] = $v['date'];?></small>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </li>
                <?php  }
              $i++;
            } ?>

        </ul>
    </div>
    <div class="col-md-6" align="left">
        <a href="timeline.php?page=<?php  if ($servicePage['page'] == 1) echo $servicePage['page'] + 1 - 1; else echo $servicePage['page'] - 1;?>" class="btn btn-info" <?php if ($servicePage['page'] == 1) echo 'disabled="disabled"';?> role="button"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Previous </a>
    </div>
    <div class="col-md-6" align="right">
        <a href="timeline.php?page=<?php  if ($servicePage['page'] == $servicePage['totalPage']) echo $servicePage['page'] + 1 - 1; else echo $servicePage['page'] + 1;?>" class="btn btn-success" <?php if ($servicePage['page'] == $servicePage['totalPage']) echo 'disabled="disabled"';?> role="button" >Next <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>
    </div>
</div>
<!-- file js bootstrap-->
<script src="bower_components/bootstrap/dist/js/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
