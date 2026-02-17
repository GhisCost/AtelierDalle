<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260217135800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, batiment VARCHAR(255) NOT NULL, escalier VARCHAR(255) NOT NULL, etage INT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE description_dispositif (id INT AUTO_INCREMENT NOT NULL, numero_de_chapitre INT DEFAULT NULL, contenu VARCHAR(255) NOT NULL, id_dispositif_id INT NOT NULL, INDEX IDX_F8F5210C6793FFFA (id_dispositif_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE dispositif (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_appartement (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) NOT NULL, id_appartement_id INT NOT NULL, INDEX IDX_86CECF1EDC1426BC (id_appartement_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_autre (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_dispositif (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) NOT NULL, id_dispositif_id INT NOT NULL, INDEX IDX_4D3C38596793FFFA (id_dispositif_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_objet (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) NOT NULL, id_objet_id INT NOT NULL, INDEX IDX_59D48889A5FB23CF (id_objet_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_portrait (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(255) NOT NULL, id_portrait_id INT DEFAULT NULL, id_portrait_non_habitant_id INT DEFAULT NULL, INDEX IDX_9A211A49A342604 (id_portrait_id), INDEX IDX_9A211A4930401DBC (id_portrait_non_habitant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE objet_habitant (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, id_habitant_id INT NOT NULL, INDEX IDX_2A7D1AB99A46BC98 (id_habitant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE portrait_habitant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(50) NOT NULL, batiment VARCHAR(20) NOT NULL, culture VARCHAR(20) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE portrait_non_habitant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(50) NOT NULL, role VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_portrait (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, id_portrait_habitant_id INT DEFAULT NULL, id_portrait_non_habitant_id INT DEFAULT NULL, INDEX IDX_375E50AE630D4060 (id_portrait_habitant_id), INDEX IDX_375E50AE30401DBC (id_portrait_non_habitant_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(70) NOT NULL, password VARCHAR(30) NOT NULL, role VARCHAR(255) NOT NULL, username VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE description_dispositif ADD CONSTRAINT FK_F8F5210C6793FFFA FOREIGN KEY (id_dispositif_id) REFERENCES dispositif (id)');
        $this->addSql('ALTER TABLE media_appartement ADD CONSTRAINT FK_86CECF1EDC1426BC FOREIGN KEY (id_appartement_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE media_dispositif ADD CONSTRAINT FK_4D3C38596793FFFA FOREIGN KEY (id_dispositif_id) REFERENCES dispositif (id)');
        $this->addSql('ALTER TABLE media_objet ADD CONSTRAINT FK_59D48889A5FB23CF FOREIGN KEY (id_objet_id) REFERENCES objet_habitant (id)');
        $this->addSql('ALTER TABLE media_portrait ADD CONSTRAINT FK_9A211A49A342604 FOREIGN KEY (id_portrait_id) REFERENCES portrait_habitant (id)');
        $this->addSql('ALTER TABLE media_portrait ADD CONSTRAINT FK_9A211A4930401DBC FOREIGN KEY (id_portrait_non_habitant_id) REFERENCES portrait_non_habitant (id)');
        $this->addSql('ALTER TABLE objet_habitant ADD CONSTRAINT FK_2A7D1AB99A46BC98 FOREIGN KEY (id_habitant_id) REFERENCES portrait_habitant (id)');
        $this->addSql('ALTER TABLE texte_portrait ADD CONSTRAINT FK_375E50AE630D4060 FOREIGN KEY (id_portrait_habitant_id) REFERENCES portrait_habitant (id)');
        $this->addSql('ALTER TABLE texte_portrait ADD CONSTRAINT FK_375E50AE30401DBC FOREIGN KEY (id_portrait_non_habitant_id) REFERENCES portrait_non_habitant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE description_dispositif DROP FOREIGN KEY FK_F8F5210C6793FFFA');
        $this->addSql('ALTER TABLE media_appartement DROP FOREIGN KEY FK_86CECF1EDC1426BC');
        $this->addSql('ALTER TABLE media_dispositif DROP FOREIGN KEY FK_4D3C38596793FFFA');
        $this->addSql('ALTER TABLE media_objet DROP FOREIGN KEY FK_59D48889A5FB23CF');
        $this->addSql('ALTER TABLE media_portrait DROP FOREIGN KEY FK_9A211A49A342604');
        $this->addSql('ALTER TABLE media_portrait DROP FOREIGN KEY FK_9A211A4930401DBC');
        $this->addSql('ALTER TABLE objet_habitant DROP FOREIGN KEY FK_2A7D1AB99A46BC98');
        $this->addSql('ALTER TABLE texte_portrait DROP FOREIGN KEY FK_375E50AE630D4060');
        $this->addSql('ALTER TABLE texte_portrait DROP FOREIGN KEY FK_375E50AE30401DBC');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE description_dispositif');
        $this->addSql('DROP TABLE dispositif');
        $this->addSql('DROP TABLE media_appartement');
        $this->addSql('DROP TABLE media_autre');
        $this->addSql('DROP TABLE media_dispositif');
        $this->addSql('DROP TABLE media_objet');
        $this->addSql('DROP TABLE media_portrait');
        $this->addSql('DROP TABLE objet_habitant');
        $this->addSql('DROP TABLE portrait_habitant');
        $this->addSql('DROP TABLE portrait_non_habitant');
        $this->addSql('DROP TABLE texte_portrait');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
