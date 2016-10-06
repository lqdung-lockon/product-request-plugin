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
use Eccube\Common\Constant;
use Eccube\Entity\MailTemplate;

/**
 * Class Version201610050840
 *
 * Migration mail template
 *
 * @package DoctrineMigrations
 */
class Version201610050840 extends AbstractMigration
{
    protected $table = 'dtb_mail_template';
    protected $mailTable = 'plg_product_request_mail';

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // create table
        $this->createPlgProductRequestMail($schema);

        // Insert data
        $this->insertMailData($schema);
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // drop table
        $schema->dropTable($this->mailTable);

        // remove data
    }

    protected function insertMailData(Schema $schema)
    {
        $app = \Eccube\Application::getInstance();
        $em = $app['orm.em'];

        $arrMailTemplateId = array();

        // Confirm mail
        $Member = $em->getRepository('Eccube\Entity\Member')->find(1);
        $MailTemplate = new MailTemplate();
        $MailTemplate->setName('Confirm product request')
            ->setSubject('Confirm product request')
            ->setFileName('\Plugin\ProductRequest\Resource\template\mail\confirm.twig')
            ->setHeader('This is header')
            ->setFooter('This is footer')
            ->setCreator($Member)
            ->setDelFlg(Constant::DISABLED)
            ->setCreateDate(new \DateTime())
            ->setUpdateDate(new \DateTime());
        $em->persite($MailTemplate);
        $arrMailTemplateId['confirm'] = $MailTemplate->getId();

        // Commit mail
        $MailTemplate = new MailTemplate();
        $MailTemplate->setName('Commit product request')
            ->setSubject('Commit product request')
            ->setFileName('\Plugin\ProductRequest\Resource\template\mail\commit.twig')
            ->setHeader('This is header')
            ->setFooter('This is footer')
            ->setCreator($Member)
            ->setDelFlg(Constant::DISABLED)
            ->setCreateDate(new \DateTime())
            ->setUpdateDate(new \DateTime());

        $em->persite($MailTemplate);
        $arrMailTemplateId['commit'] = $MailTemplate->getId();
        $em->flush();

        if ($this->connection->getDatabasePlatform()->getName() == "mysql") {
            $this->addSql("SET FOREIGN_KEY_CHECKS=0;");
            $this->addSql("SET SESSION sql_mode='NO_AUTO_VALUE_ON_ZERO';");
        }

        $rank = 0;
        foreach ($arrMailTemplateId as $name => $mailId) {
            $this->addSql("INSERT INTO $this->mailTable (id, name, rank) VALUES ($mailId, $name, $rank);");
            $rank++;
        }
    }

    /**
     * createPlgProductRequestMail
     * @param Schema $schema
     */
    protected function createPlgProductRequestMail(Schema $schema)
    {
        $table = $schema->createTable($this->mailTable);
        $table->addColumn('id', 'integer', array(
            'autoincrement' => true,
            'notnull' => true,
        ));

        $table->addColumn('name', 'text', array(
            'notnull' => false,
            'default' => null,
        ));

        $table->addColumn('rank', 'integer', array(
            'notnull' => false,
            'default' => null,
        ));

        $table->setPrimaryKey(array('id'));

        $targetTable = $schema->getTable($this->table);
        $table->addForeignKeyConstraint(
            $targetTable,
            array('id'),
            array('template_id')
        );
    }
}
