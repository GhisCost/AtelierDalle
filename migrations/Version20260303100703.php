<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260303100703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_evenement_plante DROP FOREIGN KEY `FK_A82661F0B43DE193`');
        $this->addSql('DROP INDEX IDX_A82661F0B43DE193 ON media_evenement_plante');
        $this->addSql('ALTER TABLE media_evenement_plante ADD updated_at DATETIME DEFAULT NULL, CHANGE lien_source lien_source VARCHAR(255) DEFAULT NULL, CHANGE id_evenement_plantes_id evenement_plantes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media_evenement_plante ADD CONSTRAINT FK_A82661F0B8CD1037 FOREIGN KEY (evenement_plantes_id) REFERENCES evenement_plantes (id)');
        $this->addSql('CREATE INDEX IDX_A82661F0B8CD1037 ON media_evenement_plante (evenement_plantes_id)');
        $this->addSql('ALTER TABLE media_gastronomie DROP FOREIGN KEY `FK_34EB004EB7CE1778`');
        $this->addSql('DROP INDEX IDX_34EB004EB7CE1778 ON media_gastronomie');
        $this->addSql('ALTER TABLE media_gastronomie ADD updated_at DATETIME DEFAULT NULL, CHANGE lien_source lien_source VARCHAR(255) DEFAULT NULL, CHANGE id_gastronomie_id gastronomie_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_gastronomie ADD CONSTRAINT FK_34EB004E8AA8AA7E FOREIGN KEY (gastronomie_id) REFERENCES gastronomie_dalle (id)');
        $this->addSql('CREATE INDEX IDX_34EB004E8AA8AA7E ON media_gastronomie (gastronomie_id)');
        $this->addSql('ALTER TABLE media_objet ADD updated_at DATETIME DEFAULT NULL, CHANGE contenu contenu VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE media_objet_culture DROP FOREIGN KEY `FK_89C0B471819CE336`');
        $this->addSql('DROP INDEX IDX_89C0B471819CE336 ON media_objet_culture');
        $this->addSql('ALTER TABLE media_objet_culture ADD updated_at DATETIME DEFAULT NULL, CHANGE lien_source lien_source VARCHAR(255) DEFAULT NULL, CHANGE id_objet_culture_id objetculture_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_objet_culture ADD CONSTRAINT FK_89C0B47134F204E7 FOREIGN KEY (objetculture_id) REFERENCES objet_culture (id)');
        $this->addSql('CREATE INDEX IDX_89C0B47134F204E7 ON media_objet_culture (objetculture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_evenement_plante DROP FOREIGN KEY FK_A82661F0B8CD1037');
        $this->addSql('DROP INDEX IDX_A82661F0B8CD1037 ON media_evenement_plante');
        $this->addSql('ALTER TABLE media_evenement_plante DROP updated_at, CHANGE lien_source lien_source VARCHAR(255) NOT NULL, CHANGE evenement_plantes_id id_evenement_plantes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE media_evenement_plante ADD CONSTRAINT `FK_A82661F0B43DE193` FOREIGN KEY (id_evenement_plantes_id) REFERENCES evenement_plantes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A82661F0B43DE193 ON media_evenement_plante (id_evenement_plantes_id)');
        $this->addSql('ALTER TABLE media_gastronomie DROP FOREIGN KEY FK_34EB004E8AA8AA7E');
        $this->addSql('DROP INDEX IDX_34EB004E8AA8AA7E ON media_gastronomie');
        $this->addSql('ALTER TABLE media_gastronomie DROP updated_at, CHANGE lien_source lien_source VARCHAR(255) NOT NULL, CHANGE gastronomie_id id_gastronomie_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_gastronomie ADD CONSTRAINT `FK_34EB004EB7CE1778` FOREIGN KEY (id_gastronomie_id) REFERENCES gastronomie_dalle (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_34EB004EB7CE1778 ON media_gastronomie (id_gastronomie_id)');
        $this->addSql('ALTER TABLE media_objet DROP updated_at, CHANGE contenu contenu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE media_objet_culture DROP FOREIGN KEY FK_89C0B47134F204E7');
        $this->addSql('DROP INDEX IDX_89C0B47134F204E7 ON media_objet_culture');
        $this->addSql('ALTER TABLE media_objet_culture DROP updated_at, CHANGE lien_source lien_source VARCHAR(255) NOT NULL, CHANGE objetculture_id id_objet_culture_id INT NOT NULL');
        $this->addSql('ALTER TABLE media_objet_culture ADD CONSTRAINT `FK_89C0B471819CE336` FOREIGN KEY (id_objet_culture_id) REFERENCES objet_culture (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_89C0B471819CE336 ON media_objet_culture (id_objet_culture_id)');
    }
}
