<?php

namespace app\models;

use yii\base\Model;

class CommentForm extends Model {

    public $username;
    public $email;
    public $reviews;

    public function rules() {
        return [
                [['username', 'email', 'reviews'], 'required'],
                [['reviews'], 'string'],
                [['username'], 'string', 'min' => 3, 'max' => 32],
                [['email'], 'string', 'max' => 255],
                ['email', 'email'],
        ];
    }
}