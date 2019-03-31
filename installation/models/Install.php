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
    
    public function rules() {
        return [
            ['appname', 'required'],
            ['dbhost', 'required'],
            ['database', 'required'],
            ['username', 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 3],
            ['prefix', 'string'],
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
        ];
    }
    

}
