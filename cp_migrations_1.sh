#!/bin/bash
echo "Copy Migration File(s)"
echo "----------------------"
echo "Copy Settings"
cp vendor/plathir/yii2-smart-settings/migrations/* migrations
echo "Copy Apps"
cp vendor/plathir/yii2-smart-apps/migrations/* migrations
echo "Copy Templates"
cp vendor/plathir/yii2-smart-templates/migrations/* migrations
echo "Copy Log"
cp vendor/plathir/yii2-smart-log/migrations/* migrations
echo "Copy User"
cp vendor/plathir/yii2-smart-user/migrations/* migrations
echo "Copy Widgets"
cp vendor/plathir/yii2-smart-widgets/migrations/* migrations
echo "Copy Blog"
cp vendor/plathir/yii2-smart-blog/migrations/* migrations


echo "Starting migrations...."
php yii migrate/up --migrationPath="@migration"

php yii install/load
