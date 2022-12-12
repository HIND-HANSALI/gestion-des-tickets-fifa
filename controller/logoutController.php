<?php

    session_start();
    session_reset();
    session_destroy();
    header("location: ../pages/landing_page.php");