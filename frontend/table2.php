<?php
// Include header
include 'header.php';
?>
<div class="content">
    <?php
    // SQL query to fetch data
    $sql = "SELECT p.*,cat.category_name,su.supplier_name,pr.price FROM products as p
        left join categories as cat on p.category_id = cat.category_id
        left join suppliers as su on su.supplier_id =  p.supplier_id
        left join prices as pr on pr.product_id =  p.product_id";
    $result = $conn->query($sql);
    ?>
    <table id="table2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Supplier Name</th>
                <th>Category Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['supplier_name'] ?></td>
                        <td><?= $row['category_name'] ?></td>
                        <td><?= ($row['price']) ? $row['price'] : '-' ?></td>
                    </tr>
            <?php }
            } else {
                echo "<tr><td colspan =2> No Records </td></tr>";
            } ?>
        </tbody>
    </table>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/vfs_fonts.js'></script>
<script>
    $(document).ready(function() {
        // DataTable initialisation
        $('#table2').DataTable();
    });
</script>

<?php
// Include footer
include 'footer.php';
?>