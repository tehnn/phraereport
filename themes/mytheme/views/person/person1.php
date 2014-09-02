<?php
$dir = Yii::app()->theme->baseUrl;
$cs = Yii::app()->getClientScript();

$cs->registerCssFile($dir . '/css/styles.css');
$cs->registerScriptFile($dir . '/js/excellentexport.js');
$cs->registerScriptFile($dir . '/js/scripts.js', CClientScript::POS_END);
?>
<?php
$this->breadcrumbs = array(
    'ประชากรตามโครงสร้างประชากร' => array('Person/Index'),
    'เด็กอายุน้อยกว่า 1 ปี',
);
?>

<div class="alert alert-success" role="alert"><font size="5"><i class="glyphicon glyphicon-user"></i> เด็กอายุน้อยกว่า 1 ปี</font></div>

<div style="float: left ; margin: 5px">
    <a class="search-button btn btn-primary" >เงื่อนไข <i class="glyphicon glyphicon-question-sign"></i></a>

    <div class="search-form form well" style="display:none; margin-top: 10px">
        <form method="POST">
            <?php
            $this->widget(
                    'ext.booster.widgets.TbDatePicker', array(
                'name' => 'date1',
                'options' => array(
                   
                    'format' => 'yyyy-mm-dd',
                     'language' => 'th',
                    'autoclose' => true
                ),
                      
            ));
            ?>
            <?php
            $this->widget(
                    'ext.booster.widgets.TbDatePicker', array(
                'name' => 'date2',
                'options' => array(
                    'language' => 'TH',
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true
                )
            ));
            ?>
            <input type="hidden" name="data">
           
            <input type="submit" class="btn btn-default" value="ประมวลผล">
        </form>
    </div>

</div>


<div style="float: right; margin: 5px">
    <a href="#" download="somedata.xls" class="btn btn-danger"  
       onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name');">
        Excel
    </a>

    <a href="#" download="somedata.csv"  class="btn btn-success"
       onclick="return ExcellentExport.csv(this, 'datatable', ',');">
        CSV
    </a>
    
    <a href="<?php echo $this->createUrl('Person/Person1', array('isPdf'=>TRUE))?>" target="_blank"  class="btn btn-primary">
        PDF
    </a>


    
</div>

<table id="datatable" class="table table-hover table-striped table-responsive table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>รหัส 5 หลัก</th>
            <th>ชื่อหน่วยงาน</th>

            <th>วัน-เวลา ประมวลผล</th>            
            <th>จำนวน(คน)</th>
            <th>แฟ้มที่ใช้ประมวลผล</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $i = 0;
        foreach ($model as $key => $value):
            ?>

            <tr>
                <td>
                    <?php
                    $i++;
                    echo $i;
                    ?>
                </td>
                <td><?= $value[hoscode] ?></td>
                <td><?= $value[hosname2] ?></td>
                <td>2014-07-10 (12:00)</td>

                <td><span class="badge badge-important"><?= rand(1, 1000) ?></span></td>
                <td>
                    <span class="label label-warning">person</span>                          
                </td>
            </tr>
            <?php
        endforeach;
        ?>

    </tbody>
</table>

