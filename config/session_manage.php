<?php
session_start();
if (isset($_SESSION['active_user'])) {
} else {
    header("location:./login");
}
