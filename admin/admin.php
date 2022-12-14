<?php

    if(!isset($_SESSION['email'])){
        header('location: ../pages/');
        die;
    }