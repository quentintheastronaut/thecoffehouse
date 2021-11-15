<h1>Thăm Kaffee store chúng mình</h1>

<?php
use app\core\Application;
use app\models\User;
use app\core\Database;
use app\models\Category;
use app\models\Product;
use app\controllers\ProductController;
?>

<?php
// $id = Application::$app->session->get('user');
// echo $id;

$productId = '61534bde26ae260012abe218';
$productModel = Product::getProductDetail($productId);
// echo $productModel->getDisplayInfo();
// $productModel->delete();
// if($productModel->delete()) echo "done";
// $userModel = User::get($id);
// echo $userModel->getDisplayName();
// $userModel->delete();
// $userModel = Application::$app->user;
// $tablename = $productModel->tableName();
// $statement = "DELETE * FROM $tablename  WHERE id = $productId";
// // echo $statement;
// $stt =  Application::$app->db->pdo->prepare($statement);
// $stt->execute();
// $productModel = Product::getProductDetail($productId);
// $tablename = $productModel->tableName();
// echo $tablename;
// $sql = 'DELETE FROM $tablename
//         WHERE id = :id';
// $statement = Application::$app->db->pdo->prepare($sql);
// $statement->bindParam(':id', $id, PDO::PARAM_STR);
// if ($statement->execute()) {
// 	echo 'Product have id: ' . $id . ' was deleted successfully.';
// }
// else {
//     echo "fail";
// }
// $sql = "DELETE FROM $productModel->tablename() WHERE id=?";
// $stmt= Application::$app->db->pdo->prepare($sql);
// $stmt->execute([$productId]);
$productModel->delete();
?>