<head>
<script type="text/javascript" src="./css/flexcroll.js"></script>
<style type="text/css">.flexcroll-hide-default {overflow: hidden !important;}</style>
</head>
<h2>Command List</h2>
<div id="mycustomscroll" class="flexcroll flexcrollactive" style="overflow-x: hidden; overflow-y: hidden; text-align: left; padding-right: 0px; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; position: relative; border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom-width: 0px; " tabindex="0">
<div id="mycustomscroll_mcontentwrapper" class="mcontentwrapper" style="border-bottom-style: solid; border-bottom-color: b; border-bottom-width: 0px; text-align: -webkit-auto; padding-left: 15px; padding-right: 15px; padding-top: 15px; padding-bottom: 15px; position: relative; overflow-x: hidden; overflow-y: hidden; z-index: 2; left: -15px; top: -15px; height: 1955px; width: 484px; ">
<div id="mycustomscroll_contentwrapper" class="contentwrapper" style="position: relative; width: 0%; display: block; left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; top: 0px; ">
		
		  <div class="lipsum">
			<?php
                $fichier = './pages/commands.txt';
                if($fp = fopen($fichier, 'r')) {
                    $ligne = 1;
                    echo '<table border="1" bordercolor="#00CCFF" width="470">';
                    while (!feof($fp)) {

                        ### YOU NEED THIS!!
                        $data = fgets($fp);

                        ### change the explode parameter
                        list ($name, $tampon) = explode('- ', $data);

                        list ($tow, $obj) = explode('[', $tampon);
                        echo '<tr>';
                        echo '<td align="left"><b>', $name, '</b></td>';
                        echo '<td>', $tow, '</td>';
                        echo '</tr>';
                        $ligne++;

                        ###
                        ### YOU NEED THIS!!
                        ###
                    }

                    echo '</table>';

                    ### what's this???
                    echo "$cell";

                    fclose($fp);
                } else {
                    exit('Error : open impossible ' . $fichier);
                }
                ?>
            </div>
	</div></div>
    <div id="mycustomscroll_scrollwrapper" class="scrollwrapper" style="position: absolute; top: 0px; left: 0px; width: 484px; height: 300px; ">
    <div id="mycustomscroll_zoomdetectdiv" class="zoomdetectdiv" style="font-size: 12px; height: 1em; width: 1em; position: absolute; z-index: -999; visibility: hidden; "></div>
    <div id="mycustomscroll_scrollerjogbox" class="scrollerjogbox scrollgeneric" style="visibility: hidden; "></div>
    <div id="mycustomscroll_domfixdiv" class="domfixdiv" style="display: none; "></div>
    <div id="mycustomscroll_copyholder" class="copyholder" style="border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: blue; border-right-color: blue; border-bottom-color: blue; border-left-color: blue; border-image: initial; visibility: hidden; padding-left: 15px; padding-top: 15px; padding-right: 15px; padding-bottom: 15px; border-left-width: 0px; border-right-width: 0px; border-top-width: 0px; border-bottom-width: 0px; display: none; "></div></div></div>
