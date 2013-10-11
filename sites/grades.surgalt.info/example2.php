<html>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        ul
        {
            display:none;
        }
    </style>
    <body>
        <div class="jishee_shuu">
        <a hre="#">Surgalt</a>&nbsp;&nbsp;<i class="icon-plus icon"></i><br>
        <ul>
            <li>        
                1
                <ul>
                    <li>
                        23
                    </li>
                </ul>
            </li>
            <li>                
                2
            </li>
            <li>                
                3
            </li>
        </ul>        
        Surgalt&nbsp;&nbsp;<i class="icon-plus icon"></i><br>
        <ul>
            <li>                
                1
            </li>
            <li>                
                2
            </li>
            <li>                
                3
            </li>
        </ul>
        Surgalt&nbsp;&nbsp;<i class="icon-plus icon"></i><br>
        <ul>
            <li>                
                1
            </li>
            <li>                
                2
            </li>
            <li>                
                3
            </li>
        </ul>
        </div>
    </body>
    <script src="js/jquery 1.7.1.js"></script>        
    <script>        
        $(document).ready(function(){
            $(".icon").click(function(){
                var dooshoo_ursdag = $(this).next().next();
                dooshoo_ursdag.slideDown();
                dooshoo_ursdag.siblings("ul").slideUp();
                $(this).attr("class","icon-minus icon");
                $(this).siblings("i").attr("class","icon-plus icon");
            });
        });
    </script>
</html>