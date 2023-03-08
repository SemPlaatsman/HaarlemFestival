<?php
include __DIR__ . '/../header.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminoverview.css">
    <title>Admin Overview</title>
</head>

<body>
    <h1>Venues</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Seats</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model['venue'] as $venue): ?>
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
                        <?= $venue->getLocation() ?>
                    </td>
                    <td>
                        <?= $venue->getSeats() ?>
                    </td>
                    <td>
                        <form method="post" action="/adminoverview">
                            <input type="hidden" name="id" value="<?= $venue->getId() ?>">
                            <input type="hidden" name="_valueMethod" value="DELETE">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- Insert form -->
            <tr>
                <form method="post" action="/adminoverview">
                    <td></td>
                    <td><input type="text" id="name" name="name" required></td>
                    <td><input type="datetime-local" id="date" name="date" step="1" required></td>
                    <td><input type="text" id="location" name="location" required></td>
                    <td><input type="number" id="seats" name="seats" required></td>
                    <td>
                        <input type="hidden" name="_valueMethod" value="CREATE">
                        <input type="submit" value="Insert">
                    </td>
                </form>
            </tr>
            <tr>
                <form method="post" action="/adminoverview">
                    <td><input type="number" id="id" name="id"></td>
                    <td><input type="text" id="name" name="name" required></td>
                    <td><input type="datetime-local" id="date" name="date" step="1" required></td>
                    <td><input type="text" id="location" name="location" required></td>
                    <td><input type="number" id="seats" name="seats" required></td>
                    <td>
                        <input type="hidden" name="_valueMethod" value="PUT">
                        <input type="submit" value="Edit">
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
    <h1>Events</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start date</th>
                <th>End date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($model['event'] as $event): ?>
                <tr>
                    <td>
                        <?= $event->getId() ?>
                    </td>
                    <td>
                        <?= $event->getName() ?>
                    </td>
                    <td>
                        <?= $event->getStart_date()->format('Y-m-d') ?>
                    </td>
                    <td>
                        <?= $event->getEnd_date()->format('Y-m-d') ?>
                    </td>
                    <td>
                        <form method="post" action="/adminoverview">
                            <input type="hidden" name="id" value="<?= $event->getId() ?>">
                            <input type="hidden" name="_eventMethod" value="DELETE">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- Insert form -->
            <tr>
                <form method="post" action="/adminoverview">
                    <td></td>
                    <td><input type="text" id="name" name="name" required></td>
                    <td><input type="date" id="start_date" name="start_date" required></td>
                    <td><input type="date" id="start_date" name="end_date" required></td>
                    <td>
                        <input type="hidden" name="_eventMethod" value="CREATE">
                        <input type="submit" value="Insert">
                    </td>
                </form>
            </tr>
            <tr>
                <form method="post" action="/adminoverview">
                    <td><input type="number" id="id" name="id"></td>
                    <td><input type="text" id="name" name="name" required></td>
                    <td><input type="date" id="start_date" name="start_date" required></td>
                    <td><input type="date" id="end_date" name="end_date" required></td>
                    <td>
                        <input type="hidden" name="_eventMethod" value="PUT">
                        <input type="submit" value="Edit">
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
</body>

</html>

<?php
include __DIR__ . '/../footer.php';
?>