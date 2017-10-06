<?php
/**
 * Display flash message using Bootstrap Alert.
 */
foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
    $allowKeys = ['success', 'info', 'warning', 'danger']; // Bootstrap Alert keys.
    if (in_array($key, $allowKeys)) {
        $html = "<div class=\"alert alert-{$key} fade in\">";
        $html .= '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
        $html .= "{$message}</div>\n";
        echo $html;
    }
}