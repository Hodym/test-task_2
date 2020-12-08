<?php

use yii\db\Migration;

/**
 * Class m201126_110637_Multilingual_KSL
 */
class m201126_110637_Multilingual_KSL extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
    $tableOptions = null;
     //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        //Создание таблицы для категорий    
        $this->createTable('{{%lang_category}}', [    
            'id' => $this->primaryKey(),  
            'name' => $this->string(256)->notNull(),
            'description' => $this->text()->notNull(),    
            'lang' => $this->string()->notNull(),    
            'category_id' => $this->integer(10),    
        ], $tableOptions);        

        //Создание таблицы категорий    
        $this->createTable('{{%category}}', [    
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);    


        //Создание индекса в таблице lang_category для ячейки 'category_id'
        $this->createIndex('FK_lang_category', '{{%lang_category}}', 'category_id');

        /* Связывание таблицы lang_category с таблицей category по первичным ключам.
        * При удалении записи в таблице category, записи из графы category_id таблицы lang_category будут обновлены на NULL,
        * а при обновлении записи в таблице category, записи из графы category_id таблицы lang_category будут обновлены соответственно.
        */ 
        $this->addForeignKey(
            'FK_lang_category', '{{%lang_category}}', 'category_id', '{{%category}}', 'id', 'SET NULL', 'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lang_category}}');
        $this->dropTable('{{%category}}');
    }

}
