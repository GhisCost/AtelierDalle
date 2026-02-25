<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260225101843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE texte_portrait DROP FOREIGN KEY `FK_375E50AE30401DBC`');
        $this->addSql('ALTER TABLE texte_portrait DROP FOREIGN KEY `FK_375E50AE630D4060`');
        $this->addSql('DROP INDEX IDX_375E50AE30401DBC ON texte_portrait');
        $this->addSql('DROP INDEX IDX_375E50AE630D4060 ON texte_portrait');
        $this->addSql('ALTER TABLE texte_portrait ADD portrait_habitant_id INT DEFAULT NULL, ADD portrait_non_habitant_id INT DEFAULT NULL, DROP id_portrait_habitant_id, DROP id_portrait_non_habitant_id');
        $this->addSql('ALTER TABLE texte_portrait ADD CONSTRAINT FK_375E50AE6FFDB1C4 FOREIGN KEY (portrait_habitant_id) REFERENCES portrait_habitant (id)');
        $this->addSql('ALTER TABLE texte_portrait ADD CONSTRAINT FK_375E50AE5B45279F FOREIGN KEY (portrait_non_habitant_id) REFERENCES portrait_non_habitant (id)');
        $this->addSql('CREATE INDEX IDX_375E50AE6FFDB1C4 ON texte_portrait (portrait_habitant_id)');
        $this->addSql('CREATE INDEX IDX_375E50AE5B45279F ON texte_portrait (portrait_non_habitant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE texte_portrait DROP FOREIGN KEY FK_375E50AE6FFDB1C4');
        $this->addSql('ALTER TABLE texte_portrait DROP FOREIGN KEY FK_375E50AE5B45279F');
        $this->addSql('DROP INDEX IDX_375E50AE6FFDB1C4 ON texte_portrait');
        $this->addSql('DROP INDEX IDX_375E50AE5B45279F ON texte_portrait');
        $this->addSql('ALTER TABLE texte_portrait ADD id_portrait_habitant_id INT DEFAULT NULL, ADD id_portrait_non_habitant_id INT DEFAULT NULL, DROP portrait_habitant_id, DROP portrait_non_habitant_id');
        $this->addSql('ALTER TABLE texte_portrait ADD CONSTRAINT `FK_375E50AE30401DBC` FOREIGN KEY (id_portrait_non_habitant_id) REFERENCES portrait_non_habitant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE texte_portrait ADD CONSTRAINT `FK_375E50AE630D4060` FOREIGN KEY (id_portrait_habitant_id) REFERENCES portrait_habitant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_375E50AE30401DBC ON texte_portrait (id_portrait_non_habitant_id)');
        $this->addSql('CREATE INDEX IDX_375E50AE630D4060 ON texte_portrait (id_portrait_habitant_id)');
    }
}
