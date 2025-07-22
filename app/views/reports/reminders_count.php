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
                    <li class="breadcrumb-item active" aria-current="page"><a href="/<?php echo ($_SESSION['controller']);?>" class="link-secondary"><?= ucwords($_SESSION['controller']); ?></a></li>    <!-- this is the fixed breadcrumb code for the link back to reports page -->
                    <li class="breadcrumb-item active" aria-current="page"><?= ucwords($_SESSION['method']); ?></li>
                  </ol>
                </nav>
                <h1>Reminder Count by User</h1>
                <br>
            </div>
        </div>
    </div>

    <div class="body-content"> 
        
        <br>
        <canvas id="remindersChart" style="width:100%;max-width:700px"></canvas>
        <script>
            var xValues = [<?php foreach ($data['reminders_count'] as $reminder) { echo "'" . $reminder['id'] . "',"; } ?>];
            var yValues = [<?php foreach ($data['reminders_count'] as $reminder) { echo $reminder['user_count'] . ","; } ?>];
            var barColors = ["red", "green","blue","orange","yellow","purple","pink","brown","grey","black","white","cyan","magenta","lime","maroon","navy","olive","teal"];
            new Chart("remindersChart", {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {display: false}
                }
            });
        </script>
        <br>
        <table class="table table-light table-striped">
            <thead>
                <th>user ID</th>
                <th># of Reminders</th>
            </thead>
            <tbody>
                <?php foreach ($data['reminders_count'] as $reminder) { ?>
                    <tr>
                        <td><?php echo $reminder['id']; ?></td>
                        <td><?php echo $reminder['user_count']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php require_once 'app/views/templates/footer.php' ?>
</div>    