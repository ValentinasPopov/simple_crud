<?php

include('classes/crud.php');

$classes_crud = new CRUD();
if(isset($_POST['submit_add']))
{
    $classes_crud->add_blog($_POST['title']);
}
if(isset($_POST['submit_edit']))
{
    $classes_crud->edit_blogs($_GET['edit'], $_POST['title']);
}
if(isset($_GET['delete']))
{
    $classes_crud->delete_blogs($_GET['delete']);
}

?>


<form action="" method="post">
    <input type="text" name="title">
    <input type="submit" name="submit_add">
</form>

<ul>
    <?php
    $blog = $classes_crud->show_blogs();
    if(isset($_GET['edit']))
    {
       $id = $_GET['edit'];
       $blogs = $classes_crud->show_blogs_id($_GET['edit']); 
       echo $id;
       ?>
            <form action="" method="post">
                <input type="text" name="title">
                <input type="submit" name="submit_edit">
            </form>
       <?php
    }
    else{
    foreach($blog as $blogs)
    {
     

       
    ?> <li> <?php echo $blogs['title']; ?> </li> 
        <li> <a href="index.php?edit=<?=$blogs['id']; ?>">Edit</a>   <?php echo $blogs['id'];?></li>
        <li> <a name="submit_delete" href="index.php?delete=<?=$blogs['id'];?>" onclick="return confirm('Ar tikrai?')">Delete</a></li>
    <?php 
        }
    }