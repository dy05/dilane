<?php
include_once '../App.php';
App::redirectIfNotConnect();

if (!empty($_POST)):
    $id = $_POST['id'];
    if (!empty($id)):
        $pdo = App::getPDO();
        try {
            $query = $pdo->prepare("DELETE FROM user WHERE id = :id");
            $query->bindParam(':id', $id);
            if ($query->execute()) {
                $_SESSION['success'] = 'Customer deleted successfully.';
            } else {
                $_SESSION['error'] = 'Unexpected error while deleting customer.';
            }
            header('Location:' . SITE_URL . '/dashboard/customers-list.php');
        } catch (Exception $exc) {
            $_SESSION['error'] = 'Unexpected error while deleting customer.';
        }
    endif;
else:
include_once 'partials/notfound.php';
endif;
