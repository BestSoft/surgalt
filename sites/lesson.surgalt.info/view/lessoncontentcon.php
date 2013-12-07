<html>
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <body>
<div class="container-fluid">
<div class="row-fluid">
        <table class="table table-hover" >
            <?php 
                if(isset($_GET["Lid"]))
                    {
                    include PATH_BASE.'/sites/'.HOSTNAME.'/model/Hicheeliin_aguulga_class.php';
                    Aguulga::DrawAguulga(1);
                    }
            ?>
        </table>
</div>
</div>
</body>
</html>
