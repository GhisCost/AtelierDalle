<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260305090051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_evenement_culture (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, evenement_culture_id INT DEFAULT NULL, INDEX IDX_E355E6CC407298D3 (evenement_culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_evenement_culture (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, evenement_culture_id INT NOT NULL, INDEX IDX_BAFD7639407298D3 (evenement_culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE media_evenement_culture ADD CONSTRAINT FK_E355E6CC407298D3 FOREIGN KEY (evenement_culture_id) REFERENCES evenement_culture (id)');
        $this->addSql('ALTER TABLE texte_evenement_culture ADD CONSTRAINT FK_BAFD7639407298D3 FOREIGN KEY (evenement_culture_id) REFERENCES evenement_culture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_evenement_culture DROP FOREIGN KEY FK_E355E6CC407298D3');
        $this->addSql('ALTER TABLE texte_evenement_culture DROP FOREIGN KEY FK_BAFD7639407298D3');
        $this->addSql('DROP TABLE media_evenement_culture');
        $this->addSql('DROP TABLE texte_evenement_culture');
    }
}
