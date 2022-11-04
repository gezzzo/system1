<?php


// login

function loginadmin($email,$password){
    $co = mysqli_connect("localhost","root","","system");

    $qu = " SELECT * FROM `admin` WHERE `email` = '$email' && `password` = '$password'";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}

// show supervisors

function Showsupervisors(){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "SELECT * FROM `supervisors`";

    $q = mysqli_query($co,$qu);

    $supervisors=[];

    while($res = mysqli_fetch_assoc($q)){
        $supervisors[]=$res;
    }

    return $supervisors;

}

// add supervisor

function addsupervisor($name,$email,$password,$course){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "INSERT INTO `supervisors`( `name`, `email`, `password`, `course`)  VALUES ('$name','$email','$password','$course')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}


// delete supervisor

function deletesupervisor($id){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "DELETE FROM `supervisors` WHERE `id`='$id'";
    mysqli_query($co,$qu);

    $res = mysqli_affected_rows($co);

    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}
// show students

function Showstudents(){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "SELECT * FROM `students`";

    $q = mysqli_query($co,$qu);

    $students=[];

    while($res = mysqli_fetch_assoc($q)){
        $students[]=$res;
    }

    return $students;

}

// add student

function addstudent($name,$email,$password,$department,$phone){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "INSERT INTO `students`( `name`, `email`, `password`, `department`,`phone`)  VALUES ('$name','$email','$password','$department','$phone')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}


// delete student

function deletestudent($id){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "DELETE FROM `students` WHERE `id`='$id'";
    mysqli_query($co,$qu);

    $res = mysqli_affected_rows($co);

    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}


// show questions

function Showquestions(){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "SELECT * FROM `questions`";

    $q = mysqli_query($co,$qu);

    $questions=[];

    while($res = mysqli_fetch_assoc($q)){
        $questions[]=$res;
    }

    return $questions;

}

// add question

function addquestion($question,$answer){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "INSERT INTO `questions`( `question`, `answer`)  VALUES ('$question','$answer')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}
// edit question

function editquestion($id,$question,$answer){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "UPDATE `questions` SET `question`='$question',`answer`='$answer' WHERE id = $id;";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}

// get question

function getquestion($id){
    $co = mysqli_connect("localhost","root","","system");

    $qu = " SELECT * FROM `questions` WHERE `id` = '$id' ";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}



// delete question

function deletequestion($id){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "DELETE FROM `questions` WHERE `id`='$id'";
    mysqli_query($co,$qu);

    $res = mysqli_affected_rows($co);

    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}

// show material

function Showmaterials(){

    $co = mysqli_connect("localhost","root","","system");

    $qu = "SELECT * FROM `materials`";

    $q = mysqli_query($co,$qu);

    $materials=[];

    while($res = mysqli_fetch_assoc($q)){
        $materials[]=$res;
    }

    return $materials;

}






// add material

function addmaterial($name,$img){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "INSERT INTO `materials`( `name`, `img`)  VALUES ('$name','$img')";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}

// edit material

function editmaterial($id,$name,$img){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "UPDATE `materials` SET `img`='$img',`name`='$name' WHERE id = $id;";

    mysqli_query($co,$qu);
    
    $res = mysqli_affected_rows($co);
    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }
}


// delete material

function deletematerial($id){
    $co = mysqli_connect("localhost","root","","system");

    $qu = "DELETE FROM `materials` WHERE `id`='$id'";
    mysqli_query($co,$qu);

    $res = mysqli_affected_rows($co);

    if ($res == 1) {
        return true;
    }
    else{
        return false;
    }

}

// get material

function getmaterial($id){
    $co = mysqli_connect("localhost","root","","system");

    $qu = " SELECT * FROM `materials` WHERE `id` = '$id' ";
    $q = mysqli_query($co,$qu);

    $res = mysqli_fetch_assoc($q);

    return $res;
}


