<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260318131610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, batiment VARCHAR(255) NOT NULL, escalier VARCHAR(255) NOT NULL, etage INT NOT NULL, numero VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE archive_media (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, date VARCHAR(255) DEFAULT NULL, categorie VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE ateliers_plantes (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, resume LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE barrieres (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE bruit_chantier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE culture_du_monde (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE culture_urbaine (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE description_dispositif (id INT AUTO_INCREMENT NOT NULL, numero_de_chapitre INT DEFAULT NULL, contenu VARCHAR(255) NOT NULL, dispositif_id INT NOT NULL, INDEX IDX_F8F5210CD9BB2E9F (dispositif_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE dispositif (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE echafaudages (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE evenement_culture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, culture_monde_id INT DEFAULT NULL, culture_urbaine_id INT DEFAULT NULL, INDEX IDX_B5AC8B3768AA6F86 (culture_monde_id), INDEX IDX_B5AC8B37EAE7F6A8 (culture_urbaine_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE evenement_plantes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date DATE NOT NULL, resume LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE gastronomie_dalle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, culture_monde_id INT DEFAULT NULL, INDEX IDX_57D854C068AA6F86 (culture_monde_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_appartement (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, categorie VARCHAR(255) NOT NULL, appartement_id INT NOT NULL, INDEX IDX_86CECF1EE1729BBA (appartement_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_atelier (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, atelier_id INT NOT NULL, INDEX IDX_806C9E6A82E2CF35 (atelier_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_autre (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_barrieres (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, barrieres_id INT NOT NULL, INDEX IDX_8E89D2B8E3975C83 (barrieres_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_bruit_chantier (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, bruit_chantier_id INT NOT NULL, INDEX IDX_4E1024FAE45D25E (bruit_chantier_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_culture (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, culture_monde_id INT DEFAULT NULL, culture_urbaine_id INT DEFAULT NULL, INDEX IDX_D77E1AA268AA6F86 (culture_monde_id), INDEX IDX_D77E1AA2EAE7F6A8 (culture_urbaine_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_dispositif (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, dispositif_id INT NOT NULL, INDEX IDX_4D3C3859D9BB2E9F (dispositif_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_echafaudages (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, echafaudage_id INT NOT NULL, INDEX IDX_F1570794A412077E (echafaudage_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_evenement_culture (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, evenement_culture_id INT DEFAULT NULL, INDEX IDX_E355E6CC407298D3 (evenement_culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_evenement_plante (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, evenement_plantes_id INT DEFAULT NULL, INDEX IDX_A82661F0B8CD1037 (evenement_plantes_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_gastronomie (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, gastronomie_id INT NOT NULL, INDEX IDX_34EB004E8AA8AA7E (gastronomie_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_objet (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, objet_id INT NOT NULL, INDEX IDX_59D48889F520CF5A (objet_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_objet_culture (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, objet_culture_id INT NOT NULL, INDEX IDX_89C0B4716216B6E7 (objet_culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_portrait (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, portrait_habitant_id INT DEFAULT NULL, portrait_non_habitant_id INT DEFAULT NULL, INDEX IDX_9A211A496FFDB1C4 (portrait_habitant_id), INDEX IDX_9A211A495B45279F (portrait_non_habitant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE objet_culture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, culture_id INT NOT NULL, INDEX IDX_6DA78AD0B108249D (culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE objet_habitant (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, nom VARCHAR(255) NOT NULL, habitant_id INT NOT NULL, INDEX IDX_2A7D1AB98254716F (habitant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE portrait_habitant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(50) NOT NULL, batiment VARCHAR(20) NOT NULL, culture VARCHAR(20) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE portrait_non_habitant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(50) NOT NULL, role VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE symbole_culture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, updated_at DATETIME DEFAULT NULL, culture_id INT NOT NULL, INDEX IDX_B0BD5794B108249D (culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_ateliers (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, atelier_id INT NOT NULL, INDEX IDX_1B96613482E2CF35 (atelier_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_culture (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, culture_monde_id INT DEFAULT NULL, culture_urbaine_id INT DEFAULT NULL, INDEX IDX_CFBCBBC868AA6F86 (culture_monde_id), INDEX IDX_CFBCBBC8EAE7F6A8 (culture_urbaine_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_evenement_culture (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, evenement_culture_id INT NOT NULL, INDEX IDX_BAFD7639407298D3 (evenement_culture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_evenement_plantes (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, evenement_plantes_id INT NOT NULL, INDEX IDX_FFB38B83B8CD1037 (evenement_plantes_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_gastronomie (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, gastronomie_id INT NOT NULL, INDEX IDX_526A0DE48AA8AA7E (gastronomie_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_portrait (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, portrait_habitant_id INT DEFAULT NULL, portrait_non_habitant_id INT DEFAULT NULL, INDEX IDX_375E50AE6FFDB1C4 (portrait_habitant_id), INDEX IDX_375E50AE5B45279F (portrait_non_habitant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE description_dispositif ADD CONSTRAINT FK_F8F5210CD9BB2E9F FOREIGN KEY (dispositif_id) REFERENCES dispositif (id)');
        $this->addSql('ALTER TABLE evenement_culture ADD CONSTRAINT FK_B5AC8B3768AA6F86 FOREIGN KEY (culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE evenement_culture ADD CONSTRAINT FK_B5AC8B37EAE7F6A8 FOREIGN KEY (culture_urbaine_id) REFERENCES culture_urbaine (id)');
        $this->addSql('ALTER TABLE gastronomie_dalle ADD CONSTRAINT FK_57D854C068AA6F86 FOREIGN KEY (culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE media_appartement ADD CONSTRAINT FK_86CECF1EE1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE media_atelier ADD CONSTRAINT FK_806C9E6A82E2CF35 FOREIGN KEY (atelier_id) REFERENCES ateliers_plantes (id)');
        $this->addSql('ALTER TABLE media_barrieres ADD CONSTRAINT FK_8E89D2B8E3975C83 FOREIGN KEY (barrieres_id) REFERENCES barrieres (id)');
        $this->addSql('ALTER TABLE media_bruit_chantier ADD CONSTRAINT FK_4E1024FAE45D25E FOREIGN KEY (bruit_chantier_id) REFERENCES bruit_chantier (id)');
        $this->addSql('ALTER TABLE media_culture ADD CONSTRAINT FK_D77E1AA268AA6F86 FOREIGN KEY (culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE media_culture ADD CONSTRAINT FK_D77E1AA2EAE7F6A8 FOREIGN KEY (culture_urbaine_id) REFERENCES culture_urbaine (id)');
        $this->addSql('ALTER TABLE media_dispositif ADD CONSTRAINT FK_4D3C3859D9BB2E9F FOREIGN KEY (dispositif_id) REFERENCES dispositif (id)');
        $this->addSql('ALTER TABLE media_echafaudages ADD CONSTRAINT FK_F1570794A412077E FOREIGN KEY (echafaudage_id) REFERENCES echafaudages (id)');
        $this->addSql('ALTER TABLE media_evenement_culture ADD CONSTRAINT FK_E355E6CC407298D3 FOREIGN KEY (evenement_culture_id) REFERENCES evenement_culture (id)');
        $this->addSql('ALTER TABLE media_evenement_plante ADD CONSTRAINT FK_A82661F0B8CD1037 FOREIGN KEY (evenement_plantes_id) REFERENCES evenement_plantes (id)');
        $this->addSql('ALTER TABLE media_gastronomie ADD CONSTRAINT FK_34EB004E8AA8AA7E FOREIGN KEY (gastronomie_id) REFERENCES gastronomie_dalle (id)');
        $this->addSql('ALTER TABLE media_objet ADD CONSTRAINT FK_59D48889F520CF5A FOREIGN KEY (objet_id) REFERENCES objet_habitant (id)');
        $this->addSql('ALTER TABLE media_objet_culture ADD CONSTRAINT FK_89C0B4716216B6E7 FOREIGN KEY (objet_culture_id) REFERENCES objet_culture (id)');
        $this->addSql('ALTER TABLE media_portrait ADD CONSTRAINT FK_9A211A496FFDB1C4 FOREIGN KEY (portrait_habitant_id) REFERENCES portrait_habitant (id)');
        $this->addSql('ALTER TABLE media_portrait ADD CONSTRAINT FK_9A211A495B45279F FOREIGN KEY (portrait_non_habitant_id) REFERENCES portrait_non_habitant (id)');
        $this->addSql('ALTER TABLE objet_culture ADD CONSTRAINT FK_6DA78AD0B108249D FOREIGN KEY (culture_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE objet_habitant ADD CONSTRAINT FK_2A7D1AB98254716F FOREIGN KEY (habitant_id) REFERENCES portrait_habitant (id)');
        $this->addSql('ALTER TABLE symbole_culture ADD CONSTRAINT FK_B0BD5794B108249D FOREIGN KEY (culture_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE texte_ateliers ADD CONSTRAINT FK_1B96613482E2CF35 FOREIGN KEY (atelier_id) REFERENCES ateliers_plantes (id)');
        $this->addSql('ALTER TABLE texte_culture ADD CONSTRAINT FK_CFBCBBC868AA6F86 FOREIGN KEY (culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE texte_culture ADD CONSTRAINT FK_CFBCBBC8EAE7F6A8 FOREIGN KEY (culture_urbaine_id) REFERENCES culture_urbaine (id)');
        $this->addSql('ALTER TABLE texte_evenement_culture ADD CONSTRAINT FK_BAFD7639407298D3 FOREIGN KEY (evenement_culture_id) REFERENCES evenement_culture (id)');
        $this->addSql('ALTER TABLE texte_evenement_plantes ADD CONSTRAINT FK_FFB38B83B8CD1037 FOREIGN KEY (evenement_plantes_id) REFERENCES evenement_plantes (id)');
        $this->addSql('ALTER TABLE texte_gastronomie ADD CONSTRAINT FK_526A0DE48AA8AA7E FOREIGN KEY (gastronomie_id) REFERENCES gastronomie_dalle (id)');
        $this->addSql('ALTER TABLE texte_portrait ADD CONSTRAINT FK_375E50AE6FFDB1C4 FOREIGN KEY (portrait_habitant_id) REFERENCES portrait_habitant (id)');
        $this->addSql('ALTER TABLE texte_portrait ADD CONSTRAINT FK_375E50AE5B45279F FOREIGN KEY (portrait_non_habitant_id) REFERENCES portrait_non_habitant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE description_dispositif DROP FOREIGN KEY FK_F8F5210CD9BB2E9F');
        $this->addSql('ALTER TABLE evenement_culture DROP FOREIGN KEY FK_B5AC8B3768AA6F86');
        $this->addSql('ALTER TABLE evenement_culture DROP FOREIGN KEY FK_B5AC8B37EAE7F6A8');
        $this->addSql('ALTER TABLE gastronomie_dalle DROP FOREIGN KEY FK_57D854C068AA6F86');
        $this->addSql('ALTER TABLE media_appartement DROP FOREIGN KEY FK_86CECF1EE1729BBA');
        $this->addSql('ALTER TABLE media_atelier DROP FOREIGN KEY FK_806C9E6A82E2CF35');
        $this->addSql('ALTER TABLE media_barrieres DROP FOREIGN KEY FK_8E89D2B8E3975C83');
        $this->addSql('ALTER TABLE media_bruit_chantier DROP FOREIGN KEY FK_4E1024FAE45D25E');
        $this->addSql('ALTER TABLE media_culture DROP FOREIGN KEY FK_D77E1AA268AA6F86');
        $this->addSql('ALTER TABLE media_culture DROP FOREIGN KEY FK_D77E1AA2EAE7F6A8');
        $this->addSql('ALTER TABLE media_dispositif DROP FOREIGN KEY FK_4D3C3859D9BB2E9F');
        $this->addSql('ALTER TABLE media_echafaudages DROP FOREIGN KEY FK_F1570794A412077E');
        $this->addSql('ALTER TABLE media_evenement_culture DROP FOREIGN KEY FK_E355E6CC407298D3');
        $this->addSql('ALTER TABLE media_evenement_plante DROP FOREIGN KEY FK_A82661F0B8CD1037');
        $this->addSql('ALTER TABLE media_gastronomie DROP FOREIGN KEY FK_34EB004E8AA8AA7E');
        $this->addSql('ALTER TABLE media_objet DROP FOREIGN KEY FK_59D48889F520CF5A');
        $this->addSql('ALTER TABLE media_objet_culture DROP FOREIGN KEY FK_89C0B4716216B6E7');
        $this->addSql('ALTER TABLE media_portrait DROP FOREIGN KEY FK_9A211A496FFDB1C4');
        $this->addSql('ALTER TABLE media_portrait DROP FOREIGN KEY FK_9A211A495B45279F');
        $this->addSql('ALTER TABLE objet_culture DROP FOREIGN KEY FK_6DA78AD0B108249D');
        $this->addSql('ALTER TABLE objet_habitant DROP FOREIGN KEY FK_2A7D1AB98254716F');
        $this->addSql('ALTER TABLE symbole_culture DROP FOREIGN KEY FK_B0BD5794B108249D');
        $this->addSql('ALTER TABLE texte_ateliers DROP FOREIGN KEY FK_1B96613482E2CF35');
        $this->addSql('ALTER TABLE texte_culture DROP FOREIGN KEY FK_CFBCBBC868AA6F86');
        $this->addSql('ALTER TABLE texte_culture DROP FOREIGN KEY FK_CFBCBBC8EAE7F6A8');
        $this->addSql('ALTER TABLE texte_evenement_culture DROP FOREIGN KEY FK_BAFD7639407298D3');
        $this->addSql('ALTER TABLE texte_evenement_plantes DROP FOREIGN KEY FK_FFB38B83B8CD1037');
        $this->addSql('ALTER TABLE texte_gastronomie DROP FOREIGN KEY FK_526A0DE48AA8AA7E');
        $this->addSql('ALTER TABLE texte_portrait DROP FOREIGN KEY FK_375E50AE6FFDB1C4');
        $this->addSql('ALTER TABLE texte_portrait DROP FOREIGN KEY FK_375E50AE5B45279F');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE archive_media');
        $this->addSql('DROP TABLE ateliers_plantes');
        $this->addSql('DROP TABLE barrieres');
        $this->addSql('DROP TABLE bruit_chantier');
        $this->addSql('DROP TABLE culture_du_monde');
        $this->addSql('DROP TABLE culture_urbaine');
        $this->addSql('DROP TABLE description_dispositif');
        $this->addSql('DROP TABLE dispositif');
        $this->addSql('DROP TABLE echafaudages');
        $this->addSql('DROP TABLE evenement_culture');
        $this->addSql('DROP TABLE evenement_plantes');
        $this->addSql('DROP TABLE gastronomie_dalle');
        $this->addSql('DROP TABLE media_appartement');
        $this->addSql('DROP TABLE media_atelier');
        $this->addSql('DROP TABLE media_autre');
        $this->addSql('DROP TABLE media_barrieres');
        $this->addSql('DROP TABLE media_bruit_chantier');
        $this->addSql('DROP TABLE media_culture');
        $this->addSql('DROP TABLE media_dispositif');
        $this->addSql('DROP TABLE media_echafaudages');
        $this->addSql('DROP TABLE media_evenement_culture');
        $this->addSql('DROP TABLE media_evenement_plante');
        $this->addSql('DROP TABLE media_gastronomie');
        $this->addSql('DROP TABLE media_objet');
        $this->addSql('DROP TABLE media_objet_culture');
        $this->addSql('DROP TABLE media_portrait');
        $this->addSql('DROP TABLE objet_culture');
        $this->addSql('DROP TABLE objet_habitant');
        $this->addSql('DROP TABLE portrait_habitant');
        $this->addSql('DROP TABLE portrait_non_habitant');
        $this->addSql('DROP TABLE symbole_culture');
        $this->addSql('DROP TABLE texte_ateliers');
        $this->addSql('DROP TABLE texte_culture');
        $this->addSql('DROP TABLE texte_evenement_culture');
        $this->addSql('DROP TABLE texte_evenement_plantes');
        $this->addSql('DROP TABLE texte_gastronomie');
        $this->addSql('DROP TABLE texte_portrait');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
