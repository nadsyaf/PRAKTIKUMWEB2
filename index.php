<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "components/head.php" ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include "components/sidebar.php" ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include "components/nav.php" ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">
                        <?php include "routes.php" ?>
                    </h1>
                </div>
            </div>
            <?php include "components/footer.php" ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php include "components/logout.php" ?>
    <?php include "components/script.php" ?>
</body>
</html>