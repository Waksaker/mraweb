<?php 
set_time_limit(0);
error_reporting(E_NOTICE);
include('conn.php');

$name = $_SESSION['name'];
$position = $_SESSION['position'];


?>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center; 
        }
        .news-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            justify-content: center;
        }
        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .card-body {
            padding: 15px;
        }
        .card h2 {
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        .card p {
            margin: 0 0 10px 0;
            color: #555;
        }
        .card a {
            text-decoration: none;
            color: #007BFF;
        }
    </style>
    <!-- <script type="text/javascript" src="assets/js/chart.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php include("components/header.php"); ?>
<?php include("components/sidenav.php"); ?>
<?php include("components/topnav.php"); ?>
<?php include("components/welcome.php"); ?>
<?php include("components/footer.php"); ?>  
<script>
        new DataTable('#example', {
            scrollX: true,
            // layout: {
            //     topStart: {
            //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            //     }
            // }
        });
    </script>
<script>
    new DataTable('#claim', {
        scrollX: true,
        // layout: {
        //     topStart: {
        //         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        //     }
        // }
    });
</script>
<script>
    function getClaim(val,val2,val3) {
        
        val = $('#tahun').val();
        val2 = $('#bulan').val();
        val3 = $('#ic').val();

        $('#spinner-border3').show();
        $('#list').hide();
        $('#statistik').hide();
        $.ajax({
            type: "POST",
            url: "claimsectionlist1.php",
            data: {"tahun": val,"bulan": val2,"ic": val3},
            success: function(data){
                $('#spinner-border3').hide();
                $("#list").show().html(data).fadeIn('fast');
            }
        });
    }
    
</script>