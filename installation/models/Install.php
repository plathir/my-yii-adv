<?php
namespace installation\models;

use yii\base\Model;
use Yii;

class Install extends Model {

    public $appname;
    public $dbhost;
    public $database;
    public $username;
    public $password;
    public $prefix;
    public $environment;
    public $smtp_host;
    public $smtp_user;
    public $smtp_password;
    public $smtp_port;
    public $smtp_encryption;
    
    public function rules() {
        return [
            ['appname', 'required'],
            ['dbhost', 'required'],
            ['database', 'required'],
            ['username', 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 3],
            ['prefix', 'string'],
            ['environment', 'required'],
            ['environment', 'string'],
            ['smtp_host', 'string'],
            ['smtp_user', 'string'],
            ['smtp_password', 'string'],
            ['smtp_port', 'string'],
            ['smtp_encryption', 'string'],
            
        ];
    }
    public function attributeLabels() {
        return [
            'appname' => Yii::t('app', 'Application Name'),
            'database' => Yii::t('app', 'DataBase'),
            'dbhost' => Yii::t('app', 'DB Host'),
            'username' => Yii::t('app', 'DataBase User'),
            'password' => Yii::t('app', 'Password'),
            'prefix' => Yii::t('app', 'Table Prefix'),
            'environment' => Yii::t('app', 'Environment'),
            'smtp_host' => Yii::t('app', 'SMTP Host'),
            'smtp_user' => Yii::t('app', 'SMTP User'),
            'smtp_password' => Yii::t('app', 'SMTP Password'),
            'smtp_port' => Yii::t('app', 'SMTP Port'),
            'smtp_encryption' => Yii::t('app', 'SMTP Encryption'),
        ];
    }
    

}
