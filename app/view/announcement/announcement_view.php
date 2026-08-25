<?php
    /* @var object $data */
?>
<div class="container my-5" id="mainBlock">
    <h1>Announcement!</h1>
    <div class="col-lg-8 px-0">
        <!-- btn add Announcement -->

        <div id="liveAlertPlaceholder"></div>

        <hr class="col-1 my-4">

        <table class="table" id="tableBlock">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Data and Time</th>
                <th>Actions</th>
            </tr>
            <tbody id="table-body">
            <!-- потом будет в controllers -->
            <?php foreach ($data->announcements as $announcement) :  ?>
            <tr>
                <td> <?= htmlspecialchars($announcement['id']) ?> </td>
                <td> <?= htmlspecialchars($announcement['title']) ?> </td>
                <td> <?= htmlspecialchars($announcement['content']) ?> </td>
                <td> <?= htmlspecialchars($announcement['created_at']) ?> </td>
                <td><button class="btn btn-outline-dark editBtn me-2" data-id="<?=$announcement['id']?>">Edit</button>
                <button class="btn btn-outline-danger DeleteBtn" data-id="<?=$announcement['id']?>">Delete</button></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <!-- php endwhile -->
        </table>

        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalWindowAddAnnouncement">
            Add announcement </button>

<!--        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalWindowAddAnnouncement">Add announcement</button>-->
<!--        <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#">Add announcement</a>-->
        <!-- onclick="return false;" -->
        <a href="xxx ?>controllers/remove_announcement.php" class="btn btn-danger"  id="remover_btn">Remove all announcements</a>
        <!-- <button type="button" id="editor_btn" class="btn btn-outline-dark" data-toggle="modal" data-target="#editBtn">Edit announcements(id)</button> -->
        <!-- <a href="#" class="btn btn-outline-dark"  id="editor_btn" data-toggle="modal" data-target="#editBtn">Edit announcements(id)</a>  -->
        <!--add announcemetn-->
        <div class="modal fade" id="modalWindowAddAnnouncement" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Form for announcement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="/announcement/add">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" id="attempBtn" name="btn_submit">Attempt</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!--edit data-->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit date</h5>
                    </div>
                    <!-- edit date for PHP and AJAX -->
                    <form action="?>controllers/edit_announcement.php" method="POST" id="FormForEdit">
                        <div class="modal-body">
                            <!-- hide pole ID(чтобы понять на какое именно поле нажал юзер(чтобы получить титул и контеткт оглошения)) -->
                            <input type="hidden" name="id" id="EditDateId">

                            <!-- <input type="text" id="EditDateId" name="EditDateId" class="form-control my-3" placeholder="id" aria-label="UserID" aria-describedby="visible-addon"> -->
                            <input type="text" id="EditDateTitle" name="title" class="form-control my-3" placeholder="title" aria-label="Title" aria-describedby="visible-addon">
                            <input type="text" id="EditDateContent" name="content" class="form-control my-3" placeholder="content" aria-label="Content" aria-describedby="visible-addon">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeEditModal">Close</button>
                            <button type="submit" class="btn btn-primary" name="TotalEditModal" id="TotalEditModal">Attempt</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <p id="mistake"></p>
        <!-- <button type="submit" class="btn btn-danger" submit="">Remove all announcements</button> -->

    </div>