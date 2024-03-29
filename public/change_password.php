<?php
        
    //Redirect to login and get other functions from CS50 and helpers
    require("../includes/config.php");
    
    //if arrived via a link
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("pass_form.php",["title" => "Change Password"]);
    }
    
    //if form has been submitted
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //error checking
        if(empty($_POST["new_password"]))
        {
            apologize("You must enter a password.");
        }
        else if(empty($_POST["confirmation"]))
        {
            apologize("Please confirm your passwoed.");
        }
        else if($_POST["new_password"]!=$_POST["confirmation"])
        {
            apologize("Confirmed password is not the same as Password.");
        }
        
        //calculating hash
        $new_password=password_hash($_POST["new_password"],PASSWORD_DEFAULT);
        $update=CS50::query("UPDATE users SET hash = ? WHERE id = ?", $new_password, $_SESSION["id"]);
        if($update==false)
        {
            apologize("Update failed!");
        }
        else
        {
            //Redirect to home page
            redirect("/");
        }
        
    }
    
?>