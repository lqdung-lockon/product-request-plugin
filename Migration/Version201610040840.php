<?php
/*
* This file is part of EC-CUBE
*
* Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
* http://www.lockon.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Class Version201610040840
 * @package DoctrineMigrations
 *
 * Migration table plg_product_request
 */
class Version201610040840 extends AbstractMigration
{
    protected $table = 'plg_product_request';

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->createPlgProductRequest($schema);

        // sequence
        $this->createPlgProductRequestReqIdSeq($schema);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable($this->table);

        // drop sequence.
        $schema->dropSequence('plg_product_request_req_id_seq');
    }

    protected function createPlgProductRequest(Schema $schema)
    {
        $table = $schema->createTable($this->table);
        $table->addColumn('req_id', 'integer', array(
            'autoincrement' => true,
            'notnull' => true,
        ));

        $table->addColumn('customer_id', 'integer', array(
            'notnull' => false,
            'unsigned' => true,
            'default' => null,
        ));

        $table->addColumn('product_id', 'integer', array(
            'notnull' => false,
            'unsigned' => true,
            'default' => null,
        ));

        $table->addColumn('product_class_id', 'integer', array(
            'notnull' => false,
            'unsigned' => true,
            'default' => null,
        ));

        $table->addColumn('quantity', 'integer', array(
            'notnull' => false,
            'unsigned' => true,
            'default' => 0,
        ));

        $table->addColumn('req_name01', 'text', array(
            'notnull' => false,
            'default' => null,
        ));

        $table->addColumn('req_name02', 'text', array(
            'notnull' => false,
            'default' => null,
        ));

        $table->addColumn('req_email', 'text', array(
            'notnull' => false,
            'default' => null,
        ));

        $table->addColumn('req_date', 'datetime', array(
            'notnull' => true,
            'unsigned' => false,
        ));

        $table->addColumn('commit_date', 'datetime', array(
            'notnull' => true,
            'unsigned' => false,
        ));

        $table->addColumn('del_flg', 'smallint', array(
            'notnull' => true,
            'unsigned' => false,
            'default' => 0,
        ));

        $table->addColumn('create_date', 'datetime', array(
            'notnull' => true,
            'unsigned' => false,
        ));

        $table->addColumn('update_date', 'datetime', array(
            'notnull' => true,
            'unsigned' => false,
        ));

        $table->setPrimaryKey(array('req_id'));

        $targetTable = $schema->getTable('dtb_customer');
        $table->addForeignKeyConstraint(
            $targetTable,
            array('customer_id'),
            array('customer_id')
        );

        $targetTable = $schema->getTable('dtb_product');
        $table->addForeignKeyConstraint(
            $targetTable,
            array('product_id'),
            array('product_id')
        );

        $targetTable = $schema->getTable('dtb_product_class');
        $table->addForeignKeyConstraint(
            $targetTable,
            array('product_class_id'),
            array('product_class_id')
        );
    }

    /**
     * require id seq
     * @param Schema $schema
     */
    protected function createPlgProductRequestReqIdSeq(Schema $schema)
    {
        $seq = $schema->createSequence("plg_product_request_req_id_seq");
    }
}
