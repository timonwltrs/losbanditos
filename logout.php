<?php
session_start();
session_destroy();
header("location:template/home.tpl");
exit;