<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class UploadController extends Controller
{
    public function actionCreate()
    {
        if ($_FILES['upload']) {
            $name = $_FILES['upload']['name'];
            if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name']))) {
                $message = "Вы не выбрали файл";
            } else if ($_FILES['upload']["size"] == 0 OR $_FILES['upload']["size"] > 2050000) {
                $message = "Размер файла не соответствует нормам";
            } else if (($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png")) {
                $message = "Допускается загрузка только картинок JPG и PNG.";
            } else if (!is_uploaded_file($_FILES['upload']["tmp_name"])) {
                $message = "Что-то пошло не так. Попытайтесь загрузить файл ещё раз.";
            } else {
                $uploadDir = realpath(__DIR__ . '/../../../web/uploads').'/';
                @mkdir($uploadDir, 777, true);
                $ext = explode('.', $_FILES['upload']['name']);
                $ext = end($ext);
                $name = md5(microtime(1)) .'.'. $ext;
                move_uploaded_file($_FILES['upload']['tmp_name'], $uploadDir . $name);
                $message = "Файл " . $_FILES['upload']['name'] . " загружен";
            }

            $callback = $_REQUEST['CKEditorFuncNum'];
            echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("' . $callback . '", "/uploads/' . $name . '", "' . $message . '" );</script>';

        }
    }
}