<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260224092140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ateliers_plantes (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, resume LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE barrieres (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE bruit_chantier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE echafaudages (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE evenement_plantes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date DATE NOT NULL, resume LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_atelier (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) NOT NULL, id_atelier_id INT NOT NULL, INDEX IDX_806C9E6A27684FE2 (id_atelier_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_barrieres (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) NOT NULL, id_barrieres_id INT NOT NULL, INDEX IDX_8E89D2B8C05629F1 (id_barrieres_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_bruit_chantier (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) NOT NULL, id_bruit_chantier_id INT NOT NULL, INDEX IDX_4E1024F5F72BA49 (id_bruit_chantier_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_echafaudages (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) NOT NULL, id_echafaudage_id INT NOT NULL, INDEX IDX_F15707949974BA78 (id_echafaudage_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_evenement_plante (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) NOT NULL, id_evenement_plantes_id INT DEFAULT NULL, INDEX IDX_A82661F0B43DE193 (id_evenement_plantes_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_objet_culture (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) NOT NULL, id_objet_culture_id INT NOT NULL, INDEX IDX_89C0B471819CE336 (id_objet_culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE objet_culture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, id_culture_id INT NOT NULL, INDEX IDX_6DA78AD01482A44A (id_culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE symbole_culture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, id_culture_id INT NOT NULL, INDEX IDX_B0BD57941482A44A (id_culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_ateliers (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, id_atelier_id INT NOT NULL, INDEX IDX_1B96613427684FE2 (id_atelier_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_evenement_plantes (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, id_evenement_plantes_id INT NOT NULL, INDEX IDX_FFB38B83B43DE193 (id_evenement_plantes_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE media_atelier ADD CONSTRAINT FK_806C9E6A27684FE2 FOREIGN KEY (id_atelier_id) REFERENCES ateliers_plantes (id)');
        $this->addSql('ALTER TABLE media_barrieres ADD CONSTRAINT FK_8E89D2B8C05629F1 FOREIGN KEY (id_barrieres_id) REFERENCES barrieres (id)');
        $this->addSql('ALTER TABLE media_bruit_chantier ADD CONSTRAINT FK_4E1024F5F72BA49 FOREIGN KEY (id_bruit_chantier_id) REFERENCES bruit_chantier (id)');
        $this->addSql('ALTER TABLE media_echafaudages ADD CONSTRAINT FK_F15707949974BA78 FOREIGN KEY (id_echafaudage_id) REFERENCES echafaudages (id)');
        $this->addSql('ALTER TABLE media_evenement_plante ADD CONSTRAINT FK_A82661F0B43DE193 FOREIGN KEY (id_evenement_plantes_id) REFERENCES evenement_plantes (id)');
        $this->addSql('ALTER TABLE media_objet_culture ADD CONSTRAINT FK_89C0B471819CE336 FOREIGN KEY (id_objet_culture_id) REFERENCES objet_culture (id)');
        $this->addSql('ALTER TABLE objet_culture ADD CONSTRAINT FK_6DA78AD01482A44A FOREIGN KEY (id_culture_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE symbole_culture ADD CONSTRAINT FK_B0BD57941482A44A FOREIGN KEY (id_culture_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE texte_ateliers ADD CONSTRAINT FK_1B96613427684FE2 FOREIGN KEY (id_atelier_id) REFERENCES ateliers_plantes (id)');
        $this->addSql('ALTER TABLE texte_evenement_plantes ADD CONSTRAINT FK_FFB38B83B43DE193 FOREIGN KEY (id_evenement_plantes_id) REFERENCES evenement_plantes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media_atelier DROP FOREIGN KEY FK_806C9E6A27684FE2');
        $this->addSql('ALTER TABLE media_barrieres DROP FOREIGN KEY FK_8E89D2B8C05629F1');
        $this->addSql('ALTER TABLE media_bruit_chantier DROP FOREIGN KEY FK_4E1024F5F72BA49');
        $this->addSql('ALTER TABLE media_echafaudages DROP FOREIGN KEY FK_F15707949974BA78');
        $this->addSql('ALTER TABLE media_evenement_plante DROP FOREIGN KEY FK_A82661F0B43DE193');
        $this->addSql('ALTER TABLE media_objet_culture DROP FOREIGN KEY FK_89C0B471819CE336');
        $this->addSql('ALTER TABLE objet_culture DROP FOREIGN KEY FK_6DA78AD01482A44A');
        $this->addSql('ALTER TABLE symbole_culture DROP FOREIGN KEY FK_B0BD57941482A44A');
        $this->addSql('ALTER TABLE texte_ateliers DROP FOREIGN KEY FK_1B96613427684FE2');
        $this->addSql('ALTER TABLE texte_evenement_plantes DROP FOREIGN KEY FK_FFB38B83B43DE193');
        $this->addSql('DROP TABLE ateliers_plantes');
        $this->addSql('DROP TABLE barrieres');
        $this->addSql('DROP TABLE bruit_chantier');
        $this->addSql('DROP TABLE echafaudages');
        $this->addSql('DROP TABLE evenement_plantes');
        $this->addSql('DROP TABLE media_atelier');
        $this->addSql('DROP TABLE media_barrieres');
        $this->addSql('DROP TABLE media_bruit_chantier');
        $this->addSql('DROP TABLE media_echafaudages');
        $this->addSql('DROP TABLE media_evenement_plante');
        $this->addSql('DROP TABLE media_objet_culture');
        $this->addSql('DROP TABLE objet_culture');
        $this->addSql('DROP TABLE symbole_culture');
        $this->addSql('DROP TABLE texte_ateliers');
        $this->addSql('DROP TABLE texte_evenement_plantes');
    }
}
