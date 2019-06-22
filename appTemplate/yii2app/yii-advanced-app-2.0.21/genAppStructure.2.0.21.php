<?php
/**
 * This tool is to help generate application directory structure from original yii2 advanced application template.
 * It contains function:
 * + Generate directory structure (not done).
 * + Change some code to new structure.
 */
$filesToUpdate = [
    'src/app/backend/tests/_bootstrap.php' => [
        "require_once YII_APP_BASE_PATH . '/vendor/autoload.php';",
        "require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/common/config/main.php' => [
        "'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',"
    ],
    'src/app/common/tests/_bootstrap.php' => [
        "require_once __DIR__ .  '/../../vendor/autoload.php';",
        "require_once __DIR__ .  '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/backend/web/index-test.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/backend/web/index.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/frontend/web/index-test.php' => [    
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/frontend/web/index.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/yii' => [
        "require __DIR__ . '/vendor/autoload.php';",
        "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/dev/yii_test' => [
        "require __DIR__ . '/vendor/autoload.php';",
        "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/prod/backend/web/index.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/prod/frontend/web/index.php' => [
        "require __DIR__ . '/../../vendor/autoload.php';",
        "require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/environments/prod/yii' => [
        "require __DIR__ . '/vendor/autoload.php';",
        "require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/frontend/tests/_bootstrap.php' => [
        "require_once YII_APP_BASE_PATH . '/vendor/autoload.php';",
        "require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';",
    ],
    'src/app/requirements.php' => [
        "dirname(__FILE__) . '/vendor/yiisoft/yii2',",
        "dirname(__FILE__) . '/../../vendor/yiisoft/yii2',",
    ],
];

foreach ($filesToUpdate as $file => $patterns) {
    $fileContent = file_get_contents($file);
    foreach ($patterns as $searchText) {
        $replaceText = str_replace('/vendor/', '/../yii2/vendor/', $searchText);
        $fileContent = str_replace($searchText, $replaceText, $fileContent, $count);
        if (!$count) {
            echo "ERROR: Don't find $searchText in $file\n";
        }
    }
    file_put_contents($file, $fileContent);
}