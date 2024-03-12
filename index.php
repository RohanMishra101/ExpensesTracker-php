<?php
require("./connect.php");

// SQL for categories
$sql = "SELECT * from categories";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

// SQL for Expenses
$sql1 = "SELECT expense.*, categories.label FROM expense INNER JOIN categories ON expense.category_id = categories.id";
;
$result1 = mysqli_query($conn, $sql1);
$rows1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <section title="Expenses From Section">
            <div class="expensesDiv">
                <h1>Add Expenses</h1>
                <form action="insertExp.php" method="POST">
                    <div>
                        <label for="categories">Categories :</label>
                        <select name="categories" id="">
                            <?php
                            foreach ($rows as $result) {
                                echo "<option value='{$result['id']}'>"
                                    . $result['label'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="title">Title</label>
                        <input type="text" name="title">
                        <label for="">Amount</label>
                        <input type="number" name="amount">
                        <label for="description">Description</label>
                        <input type="text" name="description">
                        <label for="expensesDate">Expenses Date</label>
                        <input type="date" name="expDate">

                    </div>
                    <div>
                        <button>Add Expenses</button>
                    </div>
                </form>
            </div>
        </section>

        <section>
            <div>
                <?php
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Amount(RS)</th>";
                echo "<th>Exp Type</th>";
                echo "<th>Description</th>";
                echo "<th>DELETE</th>";
                echo "<th>EDIT</th>";
                echo "</tr>";

                foreach ($rows1 as $result1) {
                    echo "<tr>";
                    echo "<td>" . $result1['title'] . "</td>";
                    echo "<td>" . $result1['amount'] . "</td>";
                    echo "<td>" . $result1['label'] . "</td>";
                    echo "<td>" . $result1['description'] . "</td>";
                    echo "<td> <a href='delete.php?id=" . $result1['id'] . "'>Delete</a> </td>";
                    echo "<td> <a href='edit.php?id=" . $result1['id'] . "'>edit</a> </td>";

                    echo "</tr>";

                }

                echo "</table>";
                ?>
            </div>
        </section>
    </main>
</body>

</html>