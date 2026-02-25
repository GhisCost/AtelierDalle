<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260225102202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_portrait DROP FOREIGN KEY `FK_9A211A4930401DBC`');
        $this->addSql('ALTER TABLE media_portrait DROP FOREIGN KEY `FK_9A211A49A342604`');
        $this->addSql('DROP INDEX IDX_9A211A4930401DBC ON media_portrait');
        $this->addSql('DROP INDEX IDX_9A211A49A342604 ON media_portrait');
        $this->addSql('ALTER TABLE media_portrait ADD portrait_habitant_id INT DEFAULT NULL, ADD portrait_non_habitant_id INT DEFAULT NULL, DROP id_portrait_id, DROP id_portrait_non_habitant_id');
        $this->addSql('ALTER TABLE media_portrait ADD CONSTRAINT FK_9A211A496FFDB1C4 FOREIGN KEY (portrait_habitant_id) REFERENCES portrait_habitant (id)');
        $this->addSql('ALTER TABLE media_portrait ADD CONSTRAINT FK_9A211A495B45279F FOREIGN KEY (portrait_non_habitant_id) REFERENCES portrait_non_habitant (id)');
        $this->addSql('CREATE INDEX IDX_9A211A496FFDB1C4 ON media_portrait (portrait_habitant_id)');
        $this->addSql('CREATE INDEX IDX_9A211A495B45279F ON media_portrait (portrait_non_habitant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_portrait DROP FOREIGN KEY FK_9A211A496FFDB1C4');
        $this->addSql('ALTER TABLE media_portrait DROP FOREIGN KEY FK_9A211A495B45279F');
        $this->addSql('DROP INDEX IDX_9A211A496FFDB1C4 ON media_portrait');
        $this->addSql('DROP INDEX IDX_9A211A495B45279F ON media_portrait');
        $this->addSql('ALTER TABLE media_portrait ADD id_portrait_id INT DEFAULT NULL, ADD id_portrait_non_habitant_id INT DEFAULT NULL, DROP portrait_habitant_id, DROP portrait_non_habitant_id');
        $this->addSql('ALTER TABLE media_portrait ADD CONSTRAINT `FK_9A211A4930401DBC` FOREIGN KEY (id_portrait_non_habitant_id) REFERENCES portrait_non_habitant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE media_portrait ADD CONSTRAINT `FK_9A211A49A342604` FOREIGN KEY (id_portrait_id) REFERENCES portrait_habitant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9A211A4930401DBC ON media_portrait (id_portrait_non_habitant_id)');
        $this->addSql('CREATE INDEX IDX_9A211A49A342604 ON media_portrait (id_portrait_id)');
    }
}
