<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260305132232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_objet_culture DROP FOREIGN KEY `FK_89C0B47134F204E7`');
        $this->addSql('DROP INDEX IDX_89C0B47134F204E7 ON media_objet_culture');
        $this->addSql('ALTER TABLE media_objet_culture CHANGE objetculture_id objet_culture_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_objet_culture ADD CONSTRAINT FK_89C0B4716216B6E7 FOREIGN KEY (objet_culture_id) REFERENCES objet_culture (id)');
        $this->addSql('CREATE INDEX IDX_89C0B4716216B6E7 ON media_objet_culture (objet_culture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_objet_culture DROP FOREIGN KEY FK_89C0B4716216B6E7');
        $this->addSql('DROP INDEX IDX_89C0B4716216B6E7 ON media_objet_culture');
        $this->addSql('ALTER TABLE media_objet_culture CHANGE objet_culture_id objetculture_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_objet_culture ADD CONSTRAINT `FK_89C0B47134F204E7` FOREIGN KEY (objetculture_id) REFERENCES objet_culture (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_89C0B47134F204E7 ON media_objet_culture (objetculture_id)');
    }
}
