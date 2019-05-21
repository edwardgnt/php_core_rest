<?php


include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate Database
$database = new Database();
$db = $database->connect();

// Instantiate Blog Post
$post = new Post($db);

// Blog post query
$result = $post->read();

$num = $result->rowCount();

// Check if posts
if ($num > 0) {
    $posts_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $post_item = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'body' => html_entity_decode($row['body']),
            'author' => $row['author'],
            'category_id' => $row['category_id'],
            'category_name' => $row['category_name']
        );

        // Push to "data" array
        array_push($posts_arr, $post_item);
    }

    // pre_r($posts_arr);

} else {
    echo 'No Posts Found';
}


function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display</title>
</head>
<body>

</body>
</html>