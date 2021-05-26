<?php
// Simple page redirect
function redirect($page)
{
  header('location: ' . URLROOT . '/' . $page);
}

function alerte($message)
{
  return "<script> alert(" . $message . ")</script>";
}

// Chek if user logged in
function isLoggedIn()
{
  if (isset($_SESSION['user_userName'])) {
    return true;
  } else {
    return false;
  }
}

// Chek if user is Admin
function isAdmin()
{
  if (intval($_SESSION['user_Permision']) == 1) {
    return true;
  } else {
    return false;
  }
}
