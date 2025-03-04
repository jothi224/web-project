<?php
include './database/db.php';
include 'navbar_user.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/order.css">
</head>

<body>
<?php
        $user = $_SESSION['user_id'];
        $in = "SELECT * FROM user_details WHERE user_id=?";
        $stmt = $cnnt->prepare($in);
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $ins = $stmt->get_result();
        $data = $ins->fetch_assoc();
        ?>
    <form method="post" enctype="multipart/form-data">
        
        <div id="one">
            <label for="name">Name</label><br><br>
            <input type="text" name="nam" id="nam" value="<?php echo htmlspecialchars($data['name'] ?? ''); ?>"><br><br>
            <label for="door">Door Number</label><br><br>
            <input type="text" name="door" id="door" value="<?php echo htmlspecialchars($data['door'] ?? ''); ?>"><br><br>
            <label for="street">Street</label><br><br>
            <input type="text" name="street" id="street" value="<?php echo htmlspecialchars($data['street'] ?? ''); ?>"><br><br>
            <label for="town">Town</label><br><br>
            <input type="text" name="town" id="place" value="<?php echo htmlspecialchars($data['town'] ?? ''); ?>"><br><br>
        </div>
        <div id="two">
            <label for="district">District</label><br><br>
            <input type="text" name="district" id="district" value="<?php echo htmlspecialchars($data['district'] ?? ''); ?>"><br><br>
            <label for="state">State</label><br><br>
            <input type="text" name="state" id="state" value="<?php echo htmlspecialchars($data['state'] ?? ''); ?>"><br><br>
            <label for="pincode">Pincode</label><br><br>
            <input type="text" name="pincode" id="pin" value="<?php echo htmlspecialchars($data['pincode'] ?? ''); ?>"><br><br>
            <label for="phone">Contact Number</label><br><br>
            <input type="tel" name="phone" id="phone" maxlength="10" pattern="[0-9]{10}" value="<?php echo htmlspecialchars($data['phone'] ?? ''); ?>"><br><br>
            <button type="submit" name="Update" id="sub">
                <?php echo isset($_GET['id']) ? "Edit and Payment" : "Update"; ?>
            </button>
        </div>
    </form>

    <?php
    if (isset($_POST['Update'])) {
        $name = $_POST['nam'];
        $door = $_POST['door'];
        $street = $_POST['street'];
        $town = $_POST['town'];
        $district = $_POST['district'];
        $state = $_POST['state'];
        $pincode = $_POST['pincode'];
        $phone = $_POST['phone'];

        $checkStmt = $cnnt->prepare("SELECT * FROM user_details WHERE user_id = ?");
        $checkStmt->bind_param('s', $user);
        $checkStmt->execute();
        $ins = $checkStmt->get_result();

        if ($ins->num_rows > 0) {
            $updateStmt = $cnnt->prepare("
        UPDATE user_details SET 
            name = ?, 
            door = ?, 
            street = ?, 
            town = ?, 
            district = ?, 
            state = ?, 
            pincode = ?, 
            phone = ?
             WHERE user_id = ?");
            $updateStmt->bind_param(
                'ssssssssi',
                $name,
                $door,
                $street,
                $town,
                $district,
                $state,
                $pincode,
                $phone,
                $user
            );

            if ($updateStmt->execute()) {
                if($_GET['product_id']){
                  $product_id = isset($_GET['product_id']) ?
                    htmlspecialchars($_GET['product_id']) : '';
                echo "<script>window.location.href='payment.php?product_id=" . $product_id . "'</script>";
            }
            else{
                echo "not set";
            }}
             else {
                error_log($cnnt->error);
                echo "<script>alert('Failed to update the address. Please try again.');</script>";
            }
        } 
        else {
            $insertStmt = $cnnt->prepare("
            INSERT INTO user_details (user_id, name, door, street, town, district, state, pincode, phone) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $insertStmt->bind_param('isssssssi', $user, $name, $door, $street, $town, $district, $state, $pincode, $phone);

            if ($insertStmt->execute()) {
                if($_GET['product_id']){
                    $product_id = isset($_GET['product_id']) ?
                      htmlspecialchars($_GET['product_id']) : '';
                  echo "<script>window.location.href='payment.php?product_id=" . $product_id . "'</script>";
              } }else {
                error_log($cnnt->error);
                echo "<script>alert('Failed to save the address. Please try again.');</script>";
            }
        }
    }
    ?>

</body>

</html>