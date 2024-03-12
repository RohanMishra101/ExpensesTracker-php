<?php
require("./connect.php");

// SQL for categories
$sql = "SELECT * from categories";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// SQL for Expenses
$sql1 = "SELECT * from expense";
$result1 = mysqli_query($conn, $sql1);
$rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Tracker</title>
</head>

<body>
    <main>
        <section title="Expenses From Section">
            <div class="expensesDiv">
                <h1>Add Expenses</h1>
                <form action="" method="">
                    <label for="categories">Categories :</label>
                    <select name="categories" id="">
                        <?php
                        foreach ($rows as $result) {
                            echo "<option value='{$result['label']}'>" . $result['label'] . "</option>";
                        }
                        ?>
                    </select>
                    <label for="title">Title</label>
                    <input type="text" name="title">
                    <label for="">Amount</label>
                    <label for="description">Description</label>
                    <input type="text" name="description">
                    <label for="expensesDate">Expenses Date</label>
                    <input type="date" name="expDate">

                    <button>Add Expenses</button>
                </form>
            </div>
        </section>

        <section>
            <div>
                <?php
                echo "<table>";
                echo "<tr>";
                // echo "<th>S.N.</th>";
                echo "<th>Title</th>";
                echo "<th>Amt</th>";
                echo "<th>Exp Type</th>";
                echo "<th>Description</th>";
                echo "</tr>";

                foreach ($rows1 as $result1) {
                    echo "<tr>";
                    echo "<td>" . $result1['title'] . "</td>";
                    echo "<td>" . $result1['amount'] . "</td>";
                    echo "<td>" . $result1['category_id'] . "</td>";
                    echo "<td>" . $result1['description'] . "</td>";
                    echo "</tr>";

                }

                echo "</table>";
                ?>
            </div>
        </section>
    </main>
</body>

</html>