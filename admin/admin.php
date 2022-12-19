<?php

    if(!isset($_SESSION['id']) || $_SESSION['role'] == 2 ){
        header('location: ../pages/');
        die;
    }