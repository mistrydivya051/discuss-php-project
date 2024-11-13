<?php 
session_start();
include("../common/db.php");
if(isset($_POST["signup"]))
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    $user = $conn->prepare("insert into users (username,email,password,address) values('$username','$email','$password','$address')");
    $result = $user->execute();
    if($result)
    {
        $_SESSION["user"] = ["username"=>$username,"email"=>$email,"user_id"=>$user->insert_id];
        header("location: ../index.php");
    }
    else
    {
        echo "New user not registered";
    }
}
else if(isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = "";
    $user_id = 0;
    $query = "select * from users where email='$email' and password='$password'";
    $result = $conn->query($query);
    if($result->num_rows > 0)
    {
        foreach($result as $row)
        {
            $username = $row["username"];
            $user_id = $row['id'];
        }
        $_SESSION["user"] = ["username"=>$username,"email"=>$email,"user_id"=>$user_id];
        header("location: ../index.php");
    }
    else
    {
        echo "Invalid data";
    }
}
else if(isset($_GET["logout"]))
{
    session_destroy();
    header("location: ../index.php");
}
else if(isset($_POST["ask"]))
{
    $title = $_POST["title"];
    $description = $_POST["description"];
    $category_id = $_POST["category_id"];
    $user_id = $_SESSION['user']['user_id'];

    $questions = $conn->prepare("insert into questions(title,description,category_id,user_id) values('$title','$description','$category_id','$user_id')");
    $result = $questions->execute();
    if($result)
    {
        header("location: ../index.php");
    }
    else
    {
        echo "Question is not added.";
    }
}
else if(isset($_POST["answer"]))
{
    $answer = $_POST["answer"];
    $question_id = $_POST["question_id"];
    $user_id = $_SESSION['user']['user_id'];

    $answers = $conn->prepare("insert into answers(answer,question_id,user_id) values('$answer','$question_id','$user_id')");
    $result = $answers->execute();
    if($result)
    {
        header("location: ../?q-id=$question_id");
    }
    else
    {
        echo "Answer is not submitted.";
    }
}
else if(isset($_GET["delete"]))
{
    $query = $conn->prepare("delete from questions where id='".$_GET['delete']."'");
    $result = $query->execute();
    if($result)
    {
        header("location: ../index.php");
    }
    else
    {
        echo "Question not deleted.";
    }
}
?>