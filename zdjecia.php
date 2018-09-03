<?php

session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <?php
        include_once 'header.php';
        ?>  
        <script src="js/karuzela.js"></script>
        <style>
            .mySlides {display:none;}
            /* #box3{background-color: yellow;}*/
        </style>
    </head>
    <body onload="zegar();">

        <main>            
            <div id="contener">

                <div id="nav1">
                    <div id="name1">
                        <a href="index.php" > <h5 class="powrot">G K Dev.</h5></a>
                    </div>
                    <div id="clock">
                        <h5 id="clock1">00:00.00</h5>                       
                    </div>
                </div>
                <div style="clear: both"></div>
                <div id="nav2">

                     <div id="box1"> 
                        <?php
                        include_once 'buttons.php';
                        ?>
                    </div>


                   <div id="box3" style=" background-color: #000000">

                     <!--   <button class="lewy" style="
                                        background: black;
                                        border-width: 0px;
                                        color: white;
                                        position: absolute;
                                        top: 50%; 
                                        left: 35%;
                                        
                                        width:2%;
                                        opacity: 0.5;
                                        height: 25%; 
                                        " onclick="plusDivs(-1)">&#10094;</button>
               
                       -->
                            <img class="mySlides" alt="Google " src="zdjecia/1.png" style=" width:100%; height: 100%;">
                            <img class="mySlides" alt="Wirtualna Polska" src="zdjecia/2.png" style=" width:100%; height: 100%;">
                            <img class="mySlides" alt="Interia" src="zdjecia/3.png" style=" width:100%; height: 100%;" > 
                            <img class="mySlides" alt="O2" src="zdjecia/4.png" style=" width:100%; height: 100%;">
                            <img class="mySlides" alt="Microsoft" src="zdjecia/5.png" style=" width:100%; height: 100%;">
                            <img class="mySlides" alt="Apple" src="zdjecia/6.png" style=" width:100%; height: 100%;" > 
                            <img class="mySlides" alt="Intel" src="zdjecia/7.png" style=" width:100%; height: 100%;">
                            <img class="mySlides" alt="Android" src="zdjecia/8.png" style=" width:100%; height: 100%;">
                            <img class="mySlides" alt="YouTube" src="zdjecia/9.png" style=" width:100%; height: 100%;" > 
                      
                        <!--    <button class="prawy"  style="
                                    position: absolute;
                                    background: black;
                                   float: right;
                                   border-width: 0px;
                                    color: white;
                                    opacity: 0.5;
                                    width:2%;
                                    height: 50%;
                                   " onclick="plusDivs(1)">&#10095;</button>-->
                       

                    </div>
                    <script>
                        var zegar1 = new Date();

                        var godzina = zegar1.getHours();
                        if (godzina < 10)
                            godzina = "0" + godzina;

                        var minuta = zegar1.getMinutes();
                        if (minuta < 10)
                            minuta = "0" + minuta;

                        var sekunda = zegar1.getSeconds();
                        if (sekunda < 10)
                            sekunda = "0" + sekunda;

                        document.getElementById("clock1").innerHTML = godzina + ":" + minuta + "." + sekunda;

                        setTimeout("zegar()", 1000);
                        var myIndex = 0;
                        carousel();

                        function carousel() {
                            var i;
                            var x = document.getElementsByClassName("mySlides");
                            for (i = 0; i < x.length; i++)
                            {
                                x[i].style.display = "none";
                            }
                            myIndex++;
                            if (myIndex > x.length)
                            {
                                myIndex = 1
                            }
                            x[myIndex - 1].style.display = "block";
                            setTimeout(carousel, 2000); // Change image every 2 seconds
                        }
                        /*  var slideIndex = 1;
                         showDivs(slideIndex);
                         
                         function plusDivs(n) {
                         showDivs(slideIndex += n);
                         }
                         
                         function showDivs(n) {
                         var i;
                         var x = document.getElementsByClassName("mySlides");
                         if (n > x.length) {
                         slideIndex = 1
                         }
                         if (n < 1) {
                         slideIndex = x.length
                         }
                         for (i = 0; i < x.length; i++)
                         {
                         x[i].style.display = "none";
                         }
                         x[slideIndex - 1].style.display = "block";
                         }*/
                    </script>
                </div>
                <div style="clear: both"></div>
                <footer>

                    <div class="footerClass"><h5>G K Dev.&copy;&nbsp;;ilosć odwiedzeń:
                           <?php
                            include_once 'futter.php';
                            ?>           

                        </h5></div>

                </footer>
            </div> </main>
    </body>
</html>
