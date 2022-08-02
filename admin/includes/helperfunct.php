<?php
// This is a function used for all delete properties in the comment and posts, in the admin panel.
function Delete_Comment_Post($table ,$columnName ,$comment_post_id){
    //declaring the global connection
    global $connect;
    //This is a connection and the query for the whole delete process .
    $query = mysqli_query($connect, "DELETE FROM $table WHERE $columnName = $comment_post_id");
    //If everything works well, then true is returned else false is returned.
    if ($query) {
        return true;
    }else {
        return false;
    }
}

//The Approve And Unapprove Script in the comment section only.
function Approve_Unapprove_Data($comment_id){
     //declaring the global connection
     global $connect;
    //This query is used to get the status using the comment_id column in the database.Table = auth_comment.
$query = mysqli_query($connect, "SELECT comment_status FROM auth_comment WHERE comment_id = '$comment_id' ");
//Checking if the database.Table = auth_comment, is empty or not.
$resultRows = mysqli_num_rows($query);
if ($resultRows > 0) {
    $rows = mysqli_fetch_assoc($query); 
    $comment_status = $rows['comment_status'];
    //Checking the value of the status or the data in the comment_status column
    if ($comment_status == 'Approved' ) {
        //Query to set value of comment_status to Unapproved if it was initially set to Approved in the database.Table = auth_comment.
       $sql_strQuery = mysqli_query($connect, "UPDATE auth_comment SET comment_status = 'Unapproved' WHERE comment_id = '$comment_id'");
    }else{
        //Query to set value of comment_status to Approved if it was initially set to Unapproved in the database.Table = auth_comment.
       $sql_strQuery = mysqli_query($connect, "UPDATE auth_comment SET comment_status = 'Approved' WHERE comment_id = '$comment_id'");
        
    }
    return true;
}else {
    return false;
}
}


//Redirect Helper
function redirect($page = './index.php'){
    header("Location:".$page."");
}
?>