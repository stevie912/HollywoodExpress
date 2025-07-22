<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="link-secondary">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($_SESSION['controller']); ?></li>
                  </ol>
                </nav>
                <h1>Your Reminders</h1>
                <br>
            </div>
        </div>
    </div>
    <div class="body-content"> 
        <table class="table table-dark table-striped">
            <thead>
                <th>ID</th>
                <th>user ID</th>
                <th>Subject</th>
                <th>Date</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach ($data['reminders_list'] as $reminder) { ?>
                    <tr>
                        <td><?php echo $reminder['id']; ?></td>
                        <td><?php echo $reminder['user_id']; ?></td>
                        <td><?php echo $reminder['subject']; ?></td>
                        <td><?php echo $reminder['created_at']; ?></td>
                        <td><a href="/reminders/update/?reminder_id=<?php echo $reminder['id']; ?>" class="link-info"</a>update</td>
                        <td><a href="/reminders/delete/?reminder_id=<?php echo $reminder['id']; ?>"class="link-info"</a>delete</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <button type="button" class="btn btn bg-primary-subtle" onclick="window.location.href='/reminders/create'">Create New Reminder</button>
        <br>
    </div>
   
    <?php require_once 'app/views/templates/footer.php' ?>
</div>    