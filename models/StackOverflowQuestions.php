<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class StackOverflowQuestions extends ActiveRecord
{
    public static function tableName()
    {
        return 'stack_overflow_questions';
    }

    public function rules()
    {
        return [
            [['query', 'response'], 'required'],
            [['query', 'response'], 'string'],
            [['created_at'], 'safe'],
        ];
    }
}