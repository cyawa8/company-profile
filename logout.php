<?php
session_start();
session_unset();
session_destroy();
header("location: https://www.arthamitrainternasional.com/login");
exit();
