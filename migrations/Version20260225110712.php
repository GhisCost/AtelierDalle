<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260225110712 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_objet DROP FOREIGN KEY `FK_59D48889A5FB23CF`');
        $this->addSql('DROP INDEX IDX_59D48889A5FB23CF ON media_objet');
        $this->addSql('ALTER TABLE media_objet CHANGE id_objet_id objet_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_objet ADD CONSTRAINT FK_59D48889F520CF5A FOREIGN KEY (objet_id) REFERENCES objet_habitant (id)');
        $this->addSql('CREATE INDEX IDX_59D48889F520CF5A ON media_objet (objet_id)');
        $this->addSql('ALTER TABLE objet_habitant DROP FOREIGN KEY `FK_2A7D1AB99A46BC98`');
        $this->addSql('DROP INDEX IDX_2A7D1AB99A46BC98 ON objet_habitant');
        $this->addSql('ALTER TABLE objet_habitant CHANGE id_habitant_id habitant_id INT NOT NULL');
        $this->addSql('ALTER TABLE objet_habitant ADD CONSTRAINT FK_2A7D1AB98254716F FOREIGN KEY (habitant_id) REFERENCES portrait_habitant (id)');
        $this->addSql('CREATE INDEX IDX_2A7D1AB98254716F ON objet_habitant (habitant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_objet DROP FOREIGN KEY FK_59D48889F520CF5A');
        $this->addSql('DROP INDEX IDX_59D48889F520CF5A ON media_objet');
        $this->addSql('ALTER TABLE media_objet CHANGE objet_id id_objet_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_objet ADD CONSTRAINT `FK_59D48889A5FB23CF` FOREIGN KEY (id_objet_id) REFERENCES objet_habitant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_59D48889A5FB23CF ON media_objet (id_objet_id)');
        $this->addSql('ALTER TABLE objet_habitant DROP FOREIGN KEY FK_2A7D1AB98254716F');
        $this->addSql('DROP INDEX IDX_2A7D1AB98254716F ON objet_habitant');
        $this->addSql('ALTER TABLE objet_habitant CHANGE habitant_id id_habitant_id INT NOT NULL');
        $this->addSql('ALTER TABLE objet_habitant ADD CONSTRAINT `FK_2A7D1AB99A46BC98` FOREIGN KEY (id_habitant_id) REFERENCES portrait_habitant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2A7D1AB99A46BC98 ON objet_habitant (id_habitant_id)');
    }
}
