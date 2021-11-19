<?php
session_start();

// Display errors
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Connect to database
$mysql = new mysqli('localhost', 'root', '', 'finalweb');
