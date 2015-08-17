<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20150808173000 extends AbstractMigration
{

    public function up(Schema $schema)
    {
        $this->createRelatedProductTable($schema);
    }

    public function down(Schema $schema)
    {
        $schema->dropTable('plg_related_product');
    }

    protected function createRelatedProductTable(Schema $schema)
    {
        $table = $schema->createTable("plg_related_product");
        $table->addColumn('id', 'integer', array('autoincrement' => true));
        $table->addColumn('product_id', 'integer');
        $table->addColumn('child_product_id', 'integer');
        $table->addColumn('explain', 'integer', array(
                'notnull' => false,
            ))
        ;
        $table->setPrimaryKey(array('id'));
    }
}
