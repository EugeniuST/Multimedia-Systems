<?php include "../conf.php";
session_start();
if (isset($_SESSION['auth']) == FALSE) header("Location ../no-panel-interface/index.php")
?>
<?php if (isset($_SESSION['message'])) :
?>
    <script>
        $(document).ready(function() {

            <?php foreach ($_SESSION['message'] as $name_column => $value) : ?>
                $("label[for = '<?php echo $name_column ?>']").parent().prepend('<div class="alert alert-warning" role="alert"><?php echo $value ?></div> ');
            <?php endforeach; ?>
            <?php foreach ($_SESSION['date_register'] as $name_column => $value) : ?>
                $("label[for = '<?php echo $name_column ?>']").parent().children('.form-control').val('<?php echo $_SESSION['date_register'][$name_column] ?>');
            <?php endforeach; ?>
        });
    </script>
<?php endif; ?>
<h2 class="mb-5 col-sm-6 offset-sm-3 text-center">Settings</h2>
<form action="user-edit-settings.php" method="post" class="col-sm-6 offset-sm-3">
    <?php if (isset($_SESSION['message_success'])) : ?>
        <div class="alert alert-success d-flex justify-content-center" role="alert">
            <?php echo $_SESSION['message_succes']?>
        </div>
    <?php endif; ?>
    <div class="form-row d-flex align-items-end">
        <div class="col-lg-6 form-group">
            <label for="first_name">First name:</label>
            <input name="first_name" class="form-control" type="text" value="<?php echo $_SESSION['user']['first_name'] ?>">
        </div>
        <div class="col-lg-6 form-group">
            <label for="last_name">Last name:</label>
            <input name="last_name" class="form-control" type="text" value="<?php echo $_SESSION['user']['last_name'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="agent_type">Type of agent:</label>
        <select class="form-control" name="agent_type" id="agent_type">
            <script>
                $(function() {
                    $("option#<?php echo str_replace(" ", "_", $_SESSION['user']['agent_type']) ?>").attr("selected", "selected");
                });
            </script>
            <option id="Physical_person">Physical person</option>
            <option id="Comercial_agent">Comercial agent</option>
            <option id="Company">Company</option>
        </select>
    </div>
    <div class="form-group">
        <label for="phone_number">Mobile:</label>
        <input class="form-control" type="text" name="phone_number" value="<?php echo $_SESSION['user']['mobile'] ?>">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password">
    </div>
    <div class="form-group">
        <label for="repeat_password">Password confirm:</label>
        <input name="repeat_password" class="form-control" type="password">
    </div>
    <div class="form-group d-flex flex-row justify-content-center">
        <button class="btn btn-primary" type="submit" name="user-edit-settings">Update</button>
    </div>
</form>
<?php if (isset($_SESSION['message']))
    foreach ($_SESSION['message'] as $name_column => $value) :
        unset($_SESSION['message'][$name_column]);
    endforeach; ?>
<?php
if (isset($_SESSION['message_success']))
    unset($_SESSION['message_success']);
if (isset($_SESSION['date_register']))
    foreach ($_SESSION['date_register'] as $name_column => $value) :
        unset($_SESSION['date_register'][$name_column]);
    endforeach; ?>