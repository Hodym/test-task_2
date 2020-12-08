<?php
use yii\db\Migration;
/**
 * Class m201126_110637_Multilingual_KSL
 */
class m201126_110637_Multilingual extends Migration
{
    public function safeUp() {  
        
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
            'lang' => $this->string(32)->notNull(),    
            'category_id' => $this->integer(10),    
        ], $tableOptions);        
        
        //Создание таблицы категорий    
        $this->createTable('{{%category}}', [    
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);    

        //Создание индекса в таблице lang_category для ячейки 'category_id'
        $this->createIndex(
            '{{%idx-lang_category-category_id}}',
            '{{%lang_category}}',
            'category_id'
        );

        /* Связывание таблицы lang_category с таблицей category по первичным ключам.
        * При удалении записи в таблице category, записи из графы category_id таблицы lang_category будут удалены,
        * а при обновлении записи в таблице category, записи из графы category_id таблицы lang_category будут обновлены соответственно.
        */ 
        $this->addForeignKey(
            '{{%fk-lang_category-category_id}}',
            '{{%lang_category}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        
        //Создание таблицы для товаров    
        $this->createTable('{{%lang_product}}', [    
            'id' => $this->primaryKey(),  
            'name' => $this->string(256)->notNull(),
            'description' => $this->text()->notNull(),    
            'lang' => $this->string(32)->notNull(),    
            'product_id' => $this->integer(10),    
        ], $tableOptions);        

        //Создание таблицы товаров    
        $this->createTable('{{%product}}', [    
            'id' => $this->primaryKey(),
            'filename' => $this->string(),
            'price' => $this->float()->notNull(),
            'category_id' => $this->integer(10)->notNull(),
        ], $tableOptions);    


        //Создание индекса в таблице lang_product для ячейки 'product_id'
        $this->createIndex(
            '{{%idx-lang_product-product_id}}',
            '{{%lang_product}}',
            'product_id'
        );

        /* Связывание таблицы lang_product с таблицей product по первичным ключам.
        * При удалении записи в таблице product, записи из графы product_id таблицы lang_product будут удалены,
        * а при обновлении записи в таблице product, записи из графы product_id таблицы lang_product будут обновлены соответственно.
        */ 
        $this->addForeignKey(
            '{{%fk-lang_product-product_id}}',
            '{{%lang_product}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        
        //Создание индекса в таблице product для ячейки 'category_id'
        $this->createIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}',
            'category_id'
        );

        // Связывание таблицы product с таблицей category по первичным ключам.
        $this->addForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
      
        //Создание таблицы отзывов    
        $this->createTable('{{%feedback}}', [    
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'product_id' => $this->integer(10)->notNull(),
            'username' => $this->string(32)->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'reviews' => $this->text()->notNull(),
        ], $tableOptions); 
        
        //Создание индекса в таблице feedback для ячейки 'product_id'
        $this->createIndex(
            '{{%idx-feedback-product_id}}',
            '{{%feedback}}',
            'product_id'
        );

        // Связывание таблицы feedback с таблицей product по первичным ключам.
        $this->addForeignKey(
            '{{%fk-feedback-product_id}}',
            '{{%feedback}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );     
    }
    public function safeDown()
    {
        $this->dropTable('{{%lang_category}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%lang_product}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%feedback}}');
    }

}
