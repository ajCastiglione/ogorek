<script>
  $('#table tbody').on('click', 'button', function() {
    var data = table.row($(this).parents('tr')).data();
    <?php
    $conn = mysqli_connect("localhost", "wecodisp_ccordosi", "Flowchild5", "wecodisp_wecodb");
    if ($conn->connect_error) {
      die("Connection failed:" . $conn->connect_error);
    }

    $sql = "INSERT INTO Issues ('Order-L-R', 'Customer', 'Ship Date', 'Job', 'Rel Qty', 'Asm Seq', 'Part', 'Description', 'Op Num', 'Op Desc',
                     'Est Prod Hours', 'Est Setup Hours', 'Labor Type', 'Name', 'Job Run', 'Qty Comp', 'Next Op', 'Comments', 'Shortage') 
                        VALUES (" . data[0] . ", data[1], data[2], data[3], data[4], data[5], data[6], data[7], data[8], data[9], data[10], data[11], data[12], data[13], data[14]
                        , data[15], data[16], data[17], data[18])";
    $conn->query($sql);

    $conn->close();
    ?>
    alert("Job: (" + data[0] + ") has been reported to the issues page.");
  });
</script>