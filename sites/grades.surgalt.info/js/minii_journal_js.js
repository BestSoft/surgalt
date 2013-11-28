    $(document).ready(function(){
       <?php 
       $i = 0;
       while($a["niit_aguulga"] > $i)
       {
           echo "Average_my('".$a["niit_cnt_id"][$i]."');";
           echo "Max_my('".$a["niit_cnt_id"][$i]."');";
           echo "Min_my('".$a["niit_cnt_id"][$i]."');";
           $i++;
       } 
       $i=0;
       while($a["niit_oyuutan"] > $i)
           {
                echo "Total_my('".$a["niit_oyuutan_id"][$i]."');";
                $i++;
           }
       ?>
       Reset_my(null,3);
    });