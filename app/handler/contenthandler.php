<?php

/*function insertContent($pageService)
{
try {
$url = htmlspecialchars($_POST['url']);
$body_markup = $_POST['body_markup'];
$new_body_markup = htmlspecialchars($body_markup);
$result = $pageService->insertContent($url, $new_body_markup);
if ($result) {
// return success response
header("Location: /home");
} else {
// return failed response
echo 'Something went wrong with the update';
}
} catch (Exception $e) {
// Handle the exception here
echo 'An error occurred: ' . $e->getMessage();
}
}*/

function updateContent($pageService)
{
    try {
        $id = intval($_POST['id']);
        $new_body_markup = htmlspecialchars($_POST['body_markup']);

        $result = $pageService->updateContent($id, $new_body_markup);
        if (!$result) {
            throw new Exception('Something went wrong while trying to update the content!');
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);    
    } catch (Exception $e) {
        // Handle the exception here
        echo 'An error occurred: ' . $e->getMessage();
    }
}