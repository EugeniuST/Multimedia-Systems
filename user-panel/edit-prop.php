<h2 class="text-center mb-4">Edit your property</h2>
<div class="load_camp">
    <?php if (isset($_GET['id'])) :
        $id = $_GET['id'];
        echo "../components_php/form-add-edit-prop.php?id=$id"; ?>
        <script>
            $(document).ready(function() {
                $id = <?php echo $id;?>;
                $.ajax({
                    type: "POST",
                    url: "../components_php/form-add-edit-prop.php",
                    data: {
                        id: $id
                    },
                    success: function(data) {
                        $(".load_camp").load("../components_php/form-add-edit-prop.php?id="+$id)
                    }
                });
            });
        </script>
    <?php endif; ?>
</div>