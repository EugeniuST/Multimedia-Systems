<?php
include "../conf.php";
?>
<?php session_start() ?>

<?php include "../components_php/search_bar.php" ?>

<h2 class="text-center mb-4">My properties</h2>

<?php $result = $mysql->query("SELECT * FROM all_spec where id_user = '" . $_SESSION["user"]['id'] . "' group by ad_title"); ?>
<?php $i = 1;
if ($result->num_rows > 0) : ?>
    <table class="table">
        <caption>List of my properties</caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Area</th>
                <th scope="col">Nr. of Rooms</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>

            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td>
                        <a class="btn-link" href="user-panel.php?page=edit-prop&id=<?php echo $row['id_property']; ?>">
                            <?php echo $row['ad_title']; ?>
                        </a>
                    </td>
                    <td><?php echo $row['total_area']; ?> m<sup>2</sup></td>
                    <td><?php echo $row['nr_of_rooms']; ?></td>
                    <td><?php echo $row['price']; ?>$</td>
                </tr>
            <?php $i++;
            endwhile; ?>

        </tbody>
    </table>

<?php else : ?>
    There are no properties!
<?php endif; ?>
<script>
    $(document).ready(function() {
        $('a[href$="my-properties.php"]').addClass("active");
    });
</script>