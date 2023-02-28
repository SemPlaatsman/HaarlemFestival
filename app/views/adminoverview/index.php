<?php
include __DIR__ . '/../header.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Overview</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Address</th>
                <th>Seats</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model as $venue): ?>
                <tr>
                    <td>
                        <?= $venue->getId() ?>
                    </td>
                    <td>
                        <?= $venue->getName() ?>
                    </td>
                    <td>
                        <?= $venue->getDate()->format('Y-m-d H:i:s') ?>
                    </td>
                    <td>
                        <?= $venue->getAddress() ?>
                    </td>
                    <td>
                        <?= $venue->getSeats() ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- Insert form (design will be changed later)-->
            <form method="post" action="/adminoverview">
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type="text" id="name" name="name" required><br><br>
                    </td>
                    <td>
                        <input type="datetime-local" id="date" name="date" step="1" required><br><br>
                    </td>
                    <td>
                        <input type="text" id="address" name="address" required><br><br>
                    </td>
                    <td>
                        <input type="number" id="seats" name="seats" required><br><br>
                    </td>
                    <td>
                        <input type="submit" value="Insert">
                    </td>
                </tr>
            </form>
            <!-- Update form (design will be changed later)-->
            <form method="post" action="/adminoverview">
                <tr>
                    <td>
                        <input type="number" id="id" name="id"><br><br>
                    </td>
                    <td>
                        <input type="text" id="name" name="name" required><br><br>
                    </td>
                    <td>
                        <input type="datetime-local" id="date" name="date" step="1" required><br><br>
                    </td>
                    <td>
                        <input type="text" id="address" name="address" required><br><br>
                    </td>
                    <td>
                        <input type="number" id="seats" name="seats" required><br><br>
                    </td>
                    <td>
                        <input type="hidden" name="_method" value="PUT">
                        <input type="submit" value="Update">
                    </td>
                </tr>
            </form>
            <!-- Delete form (design will be changed later)-->
            <form method="post" action="/adminoverview">
                <tr>
                    <td>
                        <input type="number" id="id" name="id"><br><br>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete">
                    </td>
                </tr>
            </form>

        </tbody>
    </table>
</body>

</html>

<?php
include __DIR__ . '/../footer.php';
?>