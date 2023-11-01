<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>about</th>
            <th>Status</th>

        </tr>
        <tr>
            <?php if ($result !== null): ?>
                <?php foreach ($result as $r): ?>
                    <td>
                        <?php echo $r; ?>
                    </td>
                <?php endforeach; ?>
            <?php else: ?>
                <td colspan="6">No data found</td>
            <?php endif; ?>

        </tr>
    </table>
</body>

</html>