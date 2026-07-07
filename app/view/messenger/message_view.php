<?php
/**    @var object $data */
?>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <h1>Notification's!</h1>
                <hr class="col-1 my-4">
                <div>
                    <div class="d-flex flex-column align-items-end">

                        <select name="userOption" class="form-select form-select-sm shadow-sm mb-3 w-120">
                            <option value="*">All users</option>
                            <option value="student">Students</option>
                            <option value="teacher">Teachers</option>
                            <option value="guest">Guest</option>
                        </select>

                        <table class="table" id="tableBlock">
                            <tr>
                                <th>ID</th>
                                <th>Full name</th>
                                <th>Message</th>
                            </tr>
                            <tbody id="table-body">
                                <?php foreach ($data->data_for_users_view as $users) : ?>
                                    <tr>
                                        <td> <?= htmlspecialchars($users->id) ?> </td>
                                        <td> <?= htmlspecialchars($users->login) ?> </td>
                                        <td><button class="btn btn-outline-dark editBtn me-2" <?= $users->id ?>>Message</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>