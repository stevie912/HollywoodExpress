<?php 
    if ($_SESSION['admin'] != true) {    //user is not admin, deny access
        $_SESSION['denied'] = true;
        header('Location: /home');
    }
    require_once 'app/views/templates/header.php' 
?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="link-secondary">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/<?php echo ($_SESSION['controller']);?>" class="link-secondary"><?= ucwords($_SESSION['controller']); ?></a></li>   <!-- this is the fixed breadcrumb code for the link back to reports page -->
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($_SESSION['method']); ?></li>
                  </ol>
                </nav>
                <h1>All Reminders</h1>
                <br>
            </div>
        </div>
    </div>
    <div class="body-content"> 
        <table class="table table-light table-striped">
            <thead>
                <th>ID</th>
                <th>user ID</th>
                <th>Subject</th>
                <th>Date</th>
            </thead>
            <tbody>
                <?php foreach ($data['reminders_list'] as $reminder) { ?>
                    <tr>
                        <td><?php echo $reminder['id']; ?></td>
                        <td><?php echo $reminder['user_id']; ?></td>
                        <td><?php echo $reminder['subject']; ?></td>
                        <td><?php echo $reminder['created_at']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>
</div>    