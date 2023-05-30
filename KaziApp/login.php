<?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['email'] == 'kaziplus@gmail.com' && 
                  $_POST['password'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'kaziplus';
                  
                  echo 'You have entered a valid email and password';
               }else {
                  $msg = 'Wrong email or password';
               }
            }
         ?>