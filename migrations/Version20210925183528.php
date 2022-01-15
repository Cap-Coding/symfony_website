<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210925183528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE pricing_plan_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pricing_plan_benefit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE pricing_plan_feature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE pricing_plan (id INT NOT NULL, name VARCHAR(50) NOT NULL, price INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE pricing_plan_pricing_plan_feature (pricing_plan_id INT NOT NULL, pricing_plan_feature_id INT NOT NULL, PRIMARY KEY(pricing_plan_id, pricing_plan_feature_id))');
        $this->addSql('CREATE INDEX IDX_D19087D429628C71 ON pricing_plan_pricing_plan_feature (pricing_plan_id)');
        $this->addSql('CREATE INDEX IDX_D19087D46C9002D8 ON pricing_plan_pricing_plan_feature (pricing_plan_feature_id)');
        $this->addSql('CREATE TABLE pricing_plan_benefit (id INT NOT NULL, pricing_plan_id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E6A62C5F29628C71 ON pricing_plan_benefit (pricing_plan_id)');
        $this->addSql('CREATE TABLE pricing_plan_feature (id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_feature ADD CONSTRAINT FK_D19087D429628C71 FOREIGN KEY (pricing_plan_id) REFERENCES pricing_plan (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_feature ADD CONSTRAINT FK_D19087D46C9002D8 FOREIGN KEY (pricing_plan_feature_id) REFERENCES pricing_plan_feature (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pricing_plan_benefit ADD CONSTRAINT FK_E6A62C5F29628C71 FOREIGN KEY (pricing_plan_id) REFERENCES pricing_plan (id) NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addSql("INSERT INTO pricing_plan VALUES(nextval('pricing_plan_id_seq'), 'Free', 0)");
        $this->addSql("INSERT INTO pricing_plan VALUES(nextval('pricing_plan_id_seq'), 'Pro', 15)");
        $this->addSql("INSERT INTO pricing_plan VALUES(nextval('pricing_plan_id_seq'), 'Enterprise', 29)");

        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 1, '10 users included')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 1, '2 GB of storage')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 1, 'Email support')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 1, 'Help center access')");

        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 2, '20 users included')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 2, '10 GB of storage')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 2, 'Priority email support')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 2, 'Help center access')");

        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 3, '30 users included')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 3, '15 GB of storage')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 3, 'Phone and email support')");
        $this->addSql("INSERT INTO pricing_plan_benefit VALUES(nextval('pricing_plan_benefit_id_seq'), 3, 'Help center access')");

        $this->addSql("INSERT INTO pricing_plan_feature VALUES(nextval('pricing_plan_feature_id_seq'), 'Public')");
        $this->addSql("INSERT INTO pricing_plan_feature VALUES(nextval('pricing_plan_feature_id_seq'), 'Private')");
        $this->addSql("INSERT INTO pricing_plan_feature VALUES(nextval('pricing_plan_feature_id_seq'), 'Permissions')");
        $this->addSql("INSERT INTO pricing_plan_feature VALUES(nextval('pricing_plan_feature_id_seq'), 'Sharing')");
        $this->addSql("INSERT INTO pricing_plan_feature VALUES(nextval('pricing_plan_feature_id_seq'), 'Unlimited members')");
        $this->addSql("INSERT INTO pricing_plan_feature VALUES(nextval('pricing_plan_feature_id_seq'), 'Extra security')");

        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(1, 1)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(1, 3)");

        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 1)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 2)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 3)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 4)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(2, 5)");

        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 1)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 2)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 3)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 4)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 5)");
        $this->addSql("INSERT INTO pricing_plan_pricing_plan_feature VALUES(3, 6)");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_feature DROP CONSTRAINT FK_D19087D429628C71');
        $this->addSql('ALTER TABLE pricing_plan_benefit DROP CONSTRAINT FK_E6A62C5F29628C71');
        $this->addSql('ALTER TABLE pricing_plan_pricing_plan_feature DROP CONSTRAINT FK_D19087D46C9002D8');
        $this->addSql('DROP SEQUENCE pricing_plan_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pricing_plan_benefit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE pricing_plan_feature_id_seq CASCADE');
        $this->addSql('DROP TABLE pricing_plan');
        $this->addSql('DROP TABLE pricing_plan_pricing_plan_feature');
        $this->addSql('DROP TABLE pricing_plan_benefit');
        $this->addSql('DROP TABLE pricing_plan_feature');
    }
}
