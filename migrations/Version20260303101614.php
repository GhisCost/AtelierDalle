<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260303101614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_appartement DROP FOREIGN KEY `FK_86CECF1EDC1426BC`');
        $this->addSql('DROP INDEX IDX_86CECF1EDC1426BC ON media_appartement');
        $this->addSql('ALTER TABLE media_appartement ADD updated_at DATETIME DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL, CHANGE id_appartement_id appartement_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_appartement ADD CONSTRAINT FK_86CECF1EE1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('CREATE INDEX IDX_86CECF1EE1729BBA ON media_appartement (appartement_id)');
        $this->addSql('ALTER TABLE media_atelier DROP FOREIGN KEY `FK_806C9E6A27684FE2`');
        $this->addSql('DROP INDEX IDX_806C9E6A27684FE2 ON media_atelier');
        $this->addSql('ALTER TABLE media_atelier ADD updated_at DATETIME DEFAULT NULL, CHANGE lien_source lien_source VARCHAR(255) DEFAULT NULL, CHANGE id_atelier_id atelier_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_atelier ADD CONSTRAINT FK_806C9E6A82E2CF35 FOREIGN KEY (atelier_id) REFERENCES ateliers_plantes (id)');
        $this->addSql('CREATE INDEX IDX_806C9E6A82E2CF35 ON media_atelier (atelier_id)');
        $this->addSql('ALTER TABLE media_autre ADD updated_at DATETIME DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE media_barrieres DROP FOREIGN KEY `FK_8E89D2B8C05629F1`');
        $this->addSql('DROP INDEX IDX_8E89D2B8C05629F1 ON media_barrieres');
        $this->addSql('ALTER TABLE media_barrieres ADD updated_at DATETIME DEFAULT NULL, CHANGE lien_source lien_source VARCHAR(255) DEFAULT NULL, CHANGE id_barrieres_id barrieres_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_barrieres ADD CONSTRAINT FK_8E89D2B8E3975C83 FOREIGN KEY (barrieres_id) REFERENCES barrieres (id)');
        $this->addSql('CREATE INDEX IDX_8E89D2B8E3975C83 ON media_barrieres (barrieres_id)');
        $this->addSql('ALTER TABLE media_bruit_chantier DROP FOREIGN KEY `FK_4E1024F5F72BA49`');
        $this->addSql('DROP INDEX IDX_4E1024F5F72BA49 ON media_bruit_chantier');
        $this->addSql('ALTER TABLE media_bruit_chantier ADD updated_at DATETIME DEFAULT NULL, CHANGE lien_source lien_source VARCHAR(255) DEFAULT NULL, CHANGE id_bruit_chantier_id bruit_chantier_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_bruit_chantier ADD CONSTRAINT FK_4E1024FAE45D25E FOREIGN KEY (bruit_chantier_id) REFERENCES bruit_chantier (id)');
        $this->addSql('CREATE INDEX IDX_4E1024FAE45D25E ON media_bruit_chantier (bruit_chantier_id)');
        $this->addSql('ALTER TABLE media_culture DROP FOREIGN KEY `FK_D77E1AA269C54407`');
        $this->addSql('ALTER TABLE media_culture DROP FOREIGN KEY `FK_D77E1AA28B203A57`');
        $this->addSql('DROP INDEX IDX_D77E1AA269C54407 ON media_culture');
        $this->addSql('DROP INDEX IDX_D77E1AA28B203A57 ON media_culture');
        $this->addSql('ALTER TABLE media_culture ADD updated_at DATETIME DEFAULT NULL, ADD culture_monde_id INT DEFAULT NULL, ADD culture_urbaine_id INT DEFAULT NULL, DROP id_culture_monde_id, DROP id_culture_urbaine_id, CHANGE lien_source lien_source VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE media_culture ADD CONSTRAINT FK_D77E1AA268AA6F86 FOREIGN KEY (culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE media_culture ADD CONSTRAINT FK_D77E1AA2EAE7F6A8 FOREIGN KEY (culture_urbaine_id) REFERENCES culture_urbaine (id)');
        $this->addSql('CREATE INDEX IDX_D77E1AA268AA6F86 ON media_culture (culture_monde_id)');
        $this->addSql('CREATE INDEX IDX_D77E1AA2EAE7F6A8 ON media_culture (culture_urbaine_id)');
        $this->addSql('ALTER TABLE media_dispositif DROP FOREIGN KEY `FK_4D3C38596793FFFA`');
        $this->addSql('DROP INDEX IDX_4D3C38596793FFFA ON media_dispositif');
        $this->addSql('ALTER TABLE media_dispositif ADD updated_at DATETIME DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL, CHANGE id_dispositif_id dispositif_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_dispositif ADD CONSTRAINT FK_4D3C3859D9BB2E9F FOREIGN KEY (dispositif_id) REFERENCES dispositif (id)');
        $this->addSql('CREATE INDEX IDX_4D3C3859D9BB2E9F ON media_dispositif (dispositif_id)');
        $this->addSql('ALTER TABLE media_echafaudages DROP FOREIGN KEY `FK_F15707949974BA78`');
        $this->addSql('DROP INDEX IDX_F15707949974BA78 ON media_echafaudages');
        $this->addSql('ALTER TABLE media_echafaudages ADD updated_at DATETIME DEFAULT NULL, CHANGE lien_source lien_source VARCHAR(255) DEFAULT NULL, CHANGE id_echafaudage_id echafaudage_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_echafaudages ADD CONSTRAINT FK_F1570794A412077E FOREIGN KEY (echafaudage_id) REFERENCES echafaudages (id)');
        $this->addSql('CREATE INDEX IDX_F1570794A412077E ON media_echafaudages (echafaudage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_appartement DROP FOREIGN KEY FK_86CECF1EE1729BBA');
        $this->addSql('DROP INDEX IDX_86CECF1EE1729BBA ON media_appartement');
        $this->addSql('ALTER TABLE media_appartement DROP updated_at, CHANGE contenu contenu VARCHAR(255) NOT NULL, CHANGE appartement_id id_appartement_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_appartement ADD CONSTRAINT `FK_86CECF1EDC1426BC` FOREIGN KEY (id_appartement_id) REFERENCES appartement (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_86CECF1EDC1426BC ON media_appartement (id_appartement_id)');
        $this->addSql('ALTER TABLE media_atelier DROP FOREIGN KEY FK_806C9E6A82E2CF35');
        $this->addSql('DROP INDEX IDX_806C9E6A82E2CF35 ON media_atelier');
        $this->addSql('ALTER TABLE media_atelier DROP updated_at, CHANGE lien_source lien_source VARCHAR(255) NOT NULL, CHANGE atelier_id id_atelier_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_atelier ADD CONSTRAINT `FK_806C9E6A27684FE2` FOREIGN KEY (id_atelier_id) REFERENCES ateliers_plantes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_806C9E6A27684FE2 ON media_atelier (id_atelier_id)');
        $this->addSql('ALTER TABLE media_autre DROP updated_at, CHANGE contenu contenu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media_barrieres DROP FOREIGN KEY FK_8E89D2B8E3975C83');
        $this->addSql('DROP INDEX IDX_8E89D2B8E3975C83 ON media_barrieres');
        $this->addSql('ALTER TABLE media_barrieres DROP updated_at, CHANGE lien_source lien_source VARCHAR(255) NOT NULL, CHANGE barrieres_id id_barrieres_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_barrieres ADD CONSTRAINT `FK_8E89D2B8C05629F1` FOREIGN KEY (id_barrieres_id) REFERENCES barrieres (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8E89D2B8C05629F1 ON media_barrieres (id_barrieres_id)');
        $this->addSql('ALTER TABLE media_bruit_chantier DROP FOREIGN KEY FK_4E1024FAE45D25E');
        $this->addSql('DROP INDEX IDX_4E1024FAE45D25E ON media_bruit_chantier');
        $this->addSql('ALTER TABLE media_bruit_chantier DROP updated_at, CHANGE lien_source lien_source VARCHAR(255) NOT NULL, CHANGE bruit_chantier_id id_bruit_chantier_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_bruit_chantier ADD CONSTRAINT `FK_4E1024F5F72BA49` FOREIGN KEY (id_bruit_chantier_id) REFERENCES bruit_chantier (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4E1024F5F72BA49 ON media_bruit_chantier (id_bruit_chantier_id)');
        $this->addSql('ALTER TABLE media_culture DROP FOREIGN KEY FK_D77E1AA268AA6F86');
        $this->addSql('ALTER TABLE media_culture DROP FOREIGN KEY FK_D77E1AA2EAE7F6A8');
        $this->addSql('DROP INDEX IDX_D77E1AA268AA6F86 ON media_culture');
        $this->addSql('DROP INDEX IDX_D77E1AA2EAE7F6A8 ON media_culture');
        $this->addSql('ALTER TABLE media_culture ADD id_culture_monde_id INT DEFAULT NULL, ADD id_culture_urbaine_id INT DEFAULT NULL, DROP updated_at, DROP culture_monde_id, DROP culture_urbaine_id, CHANGE lien_source lien_source VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media_culture ADD CONSTRAINT `FK_D77E1AA269C54407` FOREIGN KEY (id_culture_urbaine_id) REFERENCES culture_urbaine (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE media_culture ADD CONSTRAINT `FK_D77E1AA28B203A57` FOREIGN KEY (id_culture_monde_id) REFERENCES culture_du_monde (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D77E1AA269C54407 ON media_culture (id_culture_urbaine_id)');
        $this->addSql('CREATE INDEX IDX_D77E1AA28B203A57 ON media_culture (id_culture_monde_id)');
        $this->addSql('ALTER TABLE media_dispositif DROP FOREIGN KEY FK_4D3C3859D9BB2E9F');
        $this->addSql('DROP INDEX IDX_4D3C3859D9BB2E9F ON media_dispositif');
        $this->addSql('ALTER TABLE media_dispositif DROP updated_at, CHANGE contenu contenu VARCHAR(255) NOT NULL, CHANGE dispositif_id id_dispositif_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_dispositif ADD CONSTRAINT `FK_4D3C38596793FFFA` FOREIGN KEY (id_dispositif_id) REFERENCES dispositif (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_4D3C38596793FFFA ON media_dispositif (id_dispositif_id)');
        $this->addSql('ALTER TABLE media_echafaudages DROP FOREIGN KEY FK_F1570794A412077E');
        $this->addSql('DROP INDEX IDX_F1570794A412077E ON media_echafaudages');
        $this->addSql('ALTER TABLE media_echafaudages DROP updated_at, CHANGE lien_source lien_source VARCHAR(255) NOT NULL, CHANGE echafaudage_id id_echafaudage_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_echafaudages ADD CONSTRAINT `FK_F15707949974BA78` FOREIGN KEY (id_echafaudage_id) REFERENCES echafaudages (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F15707949974BA78 ON media_echafaudages (id_echafaudage_id)');
    }
}
