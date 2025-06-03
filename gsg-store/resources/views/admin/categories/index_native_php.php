<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>

<body>

    <!--  native php code -->

    <!-- <h2>Categories List</h2> -->
    <h2><?php echo $title ?></h2>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Slug</td>
                <td>Parent ID</td>
                <td>Status</td>
                <td>Created At</td>
            </tr>
        </thead>
        <tbody>
            <!-- Collection -->
             <?php foreach($categories as $category) : ?>
            <tr>
                <td><?= $category->id ?></td>
                <td><?= $category->name ?></td>
                <td><?= $category->slug ?></td>
                <td><?= $category->parent_id ?></td>
                <td><?= $category->status ?></td>
                <td><?= $category->created_at ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    
</body>

</html>