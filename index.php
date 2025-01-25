<?php
include "connection.php";
session_start();
ob_start();
?>

<?php include 'header.php' ?>

<?php if (isset($_GET['error'])): ?>
    <p><?php echo $_GET['error']; ?></p>
<?php endif ?>

<?php

if (!isset($_GET['category'])) {
    $sql = "SELECT * FROM categories ORDER BY `Order` LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $category_slug = $row['cat_name'];
        header("Location: index?category=" . urlencode($category_slug));
        ob_end_flush();
        exit();
    } else {
        echo "No categories found.";
        exit();
    }
} else {
    $category_slug = $_GET["category"];
}
?>
<div class="bg-light bg-gradient">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="bgs/m1.jpeg" class="d-block w-100" alt="..." style="height: 200px;">
            </div>
            <div class="carousel-item">
                <img src="bgs/m2.jpeg" class="d-block w-100" alt="..." style="height: 200px;">
            </div>
            <div class="carousel-item">
                <img src="bgs/m3.jpeg" class="d-block w-100" alt="..." style="height: 200px;">
            </div>
            <div class="carousel-item">
                <img src="bgs/m4.jpeg" class="d-block w-100" alt="..." style="height: 200px;">
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-4 col-lg-3">
            <div class="text-black">
                <?php
                $sql = "SELECT * FROM categories ORDER BY `Order`";
                $result = $conn->query($sql);

                $activeCategory = isset($_GET['category']) ? $_GET['category'] : '';

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $isActive = $row['cat_name'] == $activeCategory ? 'actives' : '';
                        ?>
                        <td class="td_cat <?= $isActive; ?>"
                            style="text-align:center; background-color:#fff; border: none; width: 100%; height:auto; position: relative;">
                            <a href="index.php?category=<?= $row['cat_name']; ?>" style="text-decoration: none; display: block; width: 100%;">
                                <div class="nav" style="color:#000000;">
                                    <div class="d-flex justify-content-center" style="width: 100%;">
                                        <h4 class="text-center custom-category <?= $isActive; ?>" style="width: 100%;"><?= $row['cat_name']; ?></h4>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <?php
                    }
                
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        echo '<script>window.location.assign("item")</script>';
                    }
                
                } else {
                    echo "0 results";
                }                
                ?>
            </div>
        </div>
        <div class="col-8 col-lg-9">
            <ul class="list-group" style="list-style-type: none">
                <?php
                $sql = "SELECT * FROM items WHERE item_category = '$category_slug' ORDER BY `Order`";
                $result = $conn->query($sql);
                
                echo"<div class='row mx-auto'>";
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <li>
                                    <div class="card mb-3" style="width: 14em; height:auto">
                                        <img src="uploads/<?= $row["item_image"] ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;">
                                        <div class="card-body" style="height:150px">
                                            <div class="h4"><?php echo $row["item_name"] ?></div>
                                            <?php
                                                if($row['item_price'] > 0){
                                                    ?>
                                                        <div class="h4"><?php echo $row["item_price"] ?> $</div>
                                                    <?php
                                                }
                                            ?>
                                            <div class="h6"><?php echo $row["item_ingredients"] ?></div>
                                        </div>
                                    </div>
                                </li>
                            </div>
                            <?php
                        }
                echo "</div>"; 
                } else {
                    echo '<div class="container text-white">No items in this category</div>';
                }
                $conn->close();
                ?>
            </ul>
        </div>
    </div>
    <p></p>
    <p></p>
    <p></p>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll(".td_cat a");

            links.forEach(link => {
                link.addEventListener("click", function() {
                    links.forEach(link => link.closest("td").querySelector('.custom-category').classList.remove("active"));
                    this.closest("td").querySelector('.custom-category').classList.add("actives");
                });
            });
        });
    </script>

<?php include 'footer.php' ?>