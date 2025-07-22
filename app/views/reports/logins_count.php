<?php 
    if ($_SESSION['admin'] != true) {    //user is not admin, deny access
        $_SESSION['denied'] = true;
        header('Location: /home');
    }
    require_once 'app/views/templates/header.php' 
?>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
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
                <h1>Login Count by Username</h1>
                <br>
            </div>
        </div>
    </div>
    <div class="body-content"> 
        <!-- <table class="table table-light table-striped">
            <thead>
                <th>username</th>
                <th># of Logins</th>

            </thead>
            <tbody>
                <?php foreach ($data['logins_count'] as $logins_count) { ?>
                    <tr>
                        <td><?php echo $logins_count['user']; ?></td>
                        <td><?php echo $logins_count['user_count']; ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table> -->
        <br>
        <canvas id="loginsChart" style="width:100%;max-width:700px"></canvas>
        <script>
            var xValues = [<?php foreach ($data['logins_count'] as $logins_count) { echo "'" . $logins_count['user'] . "',"; } ?>];
            var yValues = [<?php foreach ($data['logins_count'] as $logins_count) { echo $logins_count['user_count'] . ","; } ?>];
            var barColors = ["red", "green","blue","orange","yellow","purple","pink","brown","grey","black","white","cyan","magenta","maroon","lime","navy","olive","teal","silver","gold"];
            new Chart("loginsChart", {
                type: "pie",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                }
            });
        </script>
                      
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>
</div>    