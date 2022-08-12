<div class="properties d-lg-flex flex-row justify-content-start">
    <?php while ($row = $result->fetch_assoc()) : ?>
        <?php include "card.php" ?>
    <?php endwhile; ?>
</div>

<script>
    $(document).ready(function() {

        <?php if (isset($_SESSION['auth'])) : ?>
            console.log("logat");
            <?php
            $result = $mysql->query("Select * from favorite where id_user = '" . $_SESSION['user']['id'] . "'");
            while ($row = $result->fetch_assoc()) : ?>
                console.log("#" + <?php
                                    echo $row['id_property']; ?>);
                $("#" + "<?php echo $row['id_property'] ?>" + " .favorite_symbol").html('<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="heart" class="svg-inline--fa fa-heart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M472.1 270.5l-193.1 199.7c-12.64 13.07-33.27 13.08-45.91 .0107l-193.2-199.7C-16.21 212.5-13.1 116.7 49.04 62.86C103.3 15.88 186.4 24.42 236.3 75.98l19.7 20.27l19.7-20.27c49.95-51.56 132.1-60.1 187.3-13.12C525.1 116.6 528.2 212.5 472.1 270.5z"></path></svg>');
            <?php endwhile; ?>

            $(".favorite_symbol svg").click(function() {
                id_property = $(this).parent().parent().parent().attr("id");
                console.log(id_property);
                $.ajax({
                    type: "POST",
                    url: "/madeira_real_estate_1/Multimedia-Systems/components_php/update_ajax.php",
                    data: {
                        id_property: id_property,
                        favorite_update: "1"
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                });
            });
        <?php endif; ?>
    });
</script>