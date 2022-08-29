<?php
include 'partials/header.php';

$query = "SELECT * from categories";
$categories = mysqli_query($connection, $query);

// get back form data if form is invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

//delete form data session
unset($_SESSION['add-post-data']);



?>













<section class="dashboard">

    <?php if (isset($_SESSION['add-user-success'])) : ?>
        <div class="alert__message-success container ">
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>

            </p>
        </div>

    <?php elseif (isset($_SESSION['edit-user-success'])) : ?>
        <div class="alert__message-success container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>

            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-user'])) : ?>
        <div class="alert__message-error container">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>

            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-user'])) : ?>
        <div class="alert__message-error container">
            <p>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>

            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-user-success'])) : ?>
        <div class="alert__message-success container">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>

            </p>
        </div>
    <?php endif ?>


    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-left-right-b"></i></button>
        <aside>
            <ul>

                <li> <a href="add-post.php"><i class="uil uil-pen"> </i>

                        <h5> Add Post </h5>
                    </a>
                </li>




                <li> <a href="index.php" class="active"><i class="uil uil-postcard"></i>
                        <h5>Manage Posts</h5>
                    </a></li>




                <?php if (isset($_SESSION['user_is_admin'])) : ?>


                    <li> <a href="add-user.php"><i class="uil uil-user-plus"></i>
                            <h5> Add User </h5>
                        </a></li>



                    <li> <a href="manage-users.php"><i class="uil uil-users-alt"></i>
                            <h5>Manage Users</h5>
                        </a></li>




                    <li> <a href="add-category.php"><i class="uil uil-edit"></i>
                            <h5> Add Category </h5>
                        </a></li>




                    <li> <a href="manage-category.php"><i class="uil uil-list-ul"></i>
                            <h5> Manage Categories </h5>
                        </a></li>



                    <li> <a href="view-contact.php"><i class="uil uil-list-ul"></i>
                            <h5> Manage Categories </h5>
                        </a></li>

                        <li> <a href="view-contact.php"><i class="uil uil-list-ul"></i>
                            <h5> Manage Contacts</h5>
                        </a></li>

                <?php endif ?>
            </ul>



        </aside>

        <main>
            <h2>Add Posts</h2>
            <form action="./add-post-logic.php" enctype="multipart/form-data" method="post">

                <input type="text" name="title" value="<?= $title ?>" placeholder="Title">

                <select name="category">

                    <?php while ($category = mysqli_fetch_assoc($categories)) :  ?>
                        <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                    <?php endwhile ?>


                </select>
                <textarea rows="10" name="body" placeholder="Body"><?= $body ?></textarea>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                    <div class="form__control inline">


                        <label for="is_featured">Featured</label>
                        <input type="checkbox" name="is_featured" value="1" checked>

                    </div>
                <?php endif ?>

                <div class="form__control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">


                </div>
                <button type="submit" name="submit" class="btn">Add Post</button>


            </form>

        </main>
    </div>


    <?php
    include '../partials/footer.php';
    ?>