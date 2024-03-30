<?php
include_once '../App.php';
App::redirectIfNotConnect();

if (!empty($_POST)):
    $id = $_POST['id'];
    if (!empty($id)):
        $pdo = App::getPDO();
        try {
            $query = $pdo->prepare("DELETE FROM product WHERE id = :id");
            $query->bindParam(':id', $id);
            if ($query->execute()) {
                $_SESSION['success'] = 'Product deleted successfully.';
            } else {
                $_SESSION['error'] = 'Unexpected error while deleting product.';
            }
            header('Location:' . SITE_URL . '/dashboard/products-list.php');
        } catch (Exception $exc) {
            $_SESSION['error'] = 'Unexpected error while deleting product.';
        }
    endif;
else:
include_once 'partials/notfound.php';
endif;
