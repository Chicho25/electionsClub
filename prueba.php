<?php   foreach ($_POST as $key => $value) {
        $expId = explode("candidate", $key);
        if(count($expId) > 1)
        {
        echo 'paso';  
        }

      } ?>
