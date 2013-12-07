<!DOCTYPE HTML>
<html>
    <head>
    <?php require 'headerwithmenucss.php';?>
    <?php
    
    
    //insertLessoncontent s hicheliin aguulga oruulah button daragdah uyd
    if (isset($_POST["insertlessoncontent"]))
    {
$Lid = mysql_escape_string($_REQUEST['Lid']);
$insDefQuery = "INSERT INTO `humuunco_surgalt`.`lessoncontent` (`LsnCntID`, `Title`, `LsnTpID`, `Desc`, `UseMtrl`, `Attachment`, `Week`, `Sort`, `SelfPnt`, `SelfEndDt`, `LsnID`, `InsID`, `InsDt`, `UpdID`, `UpdDt`)
VALUES ('4', 'dsfdfsd', '1', 'xdfdf', 'fdf', 'sd', '1', '1', NULL, NULL, '1', NULL, NULL, NULL, NULL)";
mysql_query($insDefQuery);
header("Location: lessondefInsert.php");
echo 'Амжилттай хадгалагдлаа';

    }
    ?>
    </head>
    <body>
        <?php include PATH_BASE . '/tpl/menu.php'; ?>
        <div id="content" class="container">
            <div class="page-header">
                <h1 >Хичээл <small>үйл явдлын тойм</small></h1>
            </div>
            <div class="row">
                <div class="col-md-9">
                    // Тухайн хэрэглэгчийн хичээлүүдийн нэгдсэн самбарын мэдээлэл харагдана.
                </div>
                <div class="col-md-3">
                  <?php require 'lessonsmenu.php';?>                  
                </div>
            </div>
        </div>
        <?php include PATH_BASE . '/tpl/footer.php'; ?>
    </body>
</html> 