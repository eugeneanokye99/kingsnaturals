<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../metatags.php"; ?>
    <link rel="stylesheet" href="../styles/verify.css">
</head>
<body>
    <!---------------------- NAVBAR ------------------------------>
    <?php include "../navbar.php"; ?>

    <!----------------------- VERIFICATION ------------------------->
    <section class="verify" id="verify">
        <div class="container verification-container">
            <h2>Enter Verification Code</h2>
            <form id="verifyForm">
                <div class="input-container">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this, 'box2')" id="box1" inputmode="numeric" pattern="\d*">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this, 'box3')" id="box2" inputmode="numeric" pattern="\d*">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this, 'box4')" id="box3" inputmode="numeric" pattern="\d*">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this, 'box5')" id="box4" inputmode="numeric" pattern="\d*">
                    <input type="text" maxlength="1" class="input-box" oninput="moveToNext(this, 'box6')" id="box5" inputmode="numeric" pattern="\d*">
                    <input type="text" maxlength="1" class="input-box" id="box6" oninput="moveToNext(this, null)" inputmode="numeric" pattern="\d*">
                </div>
                <button type="button" class="submit-btn" onclick="submitCode()">Verify</button>
            </form>
        </div>
    </section>

    <!---------------------- FOOTER ------------------------------>
    <?php include "../footer.php"; ?>

    <div class="copyright">
        <p>copyright &copy; 2024 All rights reserved</p>
    </div>

    <script src="../javascript/script.js"></script>
</body>
</html>
