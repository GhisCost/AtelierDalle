<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260220152843 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE culture_du_monde (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE culture_urbaine (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE evenement_culture (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, id_culture_monde_id INT DEFAULT NULL, id_culture_urbaine_id INT DEFAULT NULL, INDEX IDX_B5AC8B378B203A57 (id_culture_monde_id), INDEX IDX_B5AC8B3769C54407 (id_culture_urbaine_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE gastronomie_dalle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, id_culture_monde_id INT DEFAULT NULL, INDEX IDX_57D854C08B203A57 (id_culture_monde_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_culture (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) NOT NULL, id_culture_monde_id INT DEFAULT NULL, id_culture_urbaine_id INT DEFAULT NULL, INDEX IDX_D77E1AA28B203A57 (id_culture_monde_id), INDEX IDX_D77E1AA269C54407 (id_culture_urbaine_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE media_gastronomie (id INT AUTO_INCREMENT NOT NULL, lien_source VARCHAR(255) NOT NULL, id_gastronomie_id INT NOT NULL, INDEX IDX_34EB004EB7CE1778 (id_gastronomie_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_culture (id INT AUTO_INCREMENT NOT NULL, contenu LONGTEXT NOT NULL, id_culture_monde_id INT DEFAULT NULL, id_culture_urbaine_id INT DEFAULT NULL, INDEX IDX_CFBCBBC88B203A57 (id_culture_monde_id), INDEX IDX_CFBCBBC869C54407 (id_culture_urbaine_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE texte_gastronomie (id INT AUTO_INCREMENT NOT NULL, id_gastronomie_id INT NOT NULL, INDEX IDX_526A0DE4B7CE1778 (id_gastronomie_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE evenement_culture ADD CONSTRAINT FK_B5AC8B378B203A57 FOREIGN KEY (id_culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE evenement_culture ADD CONSTRAINT FK_B5AC8B3769C54407 FOREIGN KEY (id_culture_urbaine_id) REFERENCES culture_urbaine (id)');
        $this->addSql('ALTER TABLE gastronomie_dalle ADD CONSTRAINT FK_57D854C08B203A57 FOREIGN KEY (id_culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE media_culture ADD CONSTRAINT FK_D77E1AA28B203A57 FOREIGN KEY (id_culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE media_culture ADD CONSTRAINT FK_D77E1AA269C54407 FOREIGN KEY (id_culture_urbaine_id) REFERENCES culture_urbaine (id)');
        $this->addSql('ALTER TABLE media_gastronomie ADD CONSTRAINT FK_34EB004EB7CE1778 FOREIGN KEY (id_gastronomie_id) REFERENCES gastronomie_dalle (id)');
        $this->addSql('ALTER TABLE texte_culture ADD CONSTRAINT FK_CFBCBBC88B203A57 FOREIGN KEY (id_culture_monde_id) REFERENCES culture_du_monde (id)');
        $this->addSql('ALTER TABLE texte_culture ADD CONSTRAINT FK_CFBCBBC869C54407 FOREIGN KEY (id_culture_urbaine_id) REFERENCES culture_urbaine (id)');
        $this->addSql('ALTER TABLE texte_gastronomie ADD CONSTRAINT FK_526A0DE4B7CE1778 FOREIGN KEY (id_gastronomie_id) REFERENCES gastronomie_dalle (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement_culture DROP FOREIGN KEY FK_B5AC8B378B203A57');
        $this->addSql('ALTER TABLE evenement_culture DROP FOREIGN KEY FK_B5AC8B3769C54407');
        $this->addSql('ALTER TABLE gastronomie_dalle DROP FOREIGN KEY FK_57D854C08B203A57');
        $this->addSql('ALTER TABLE media_culture DROP FOREIGN KEY FK_D77E1AA28B203A57');
        $this->addSql('ALTER TABLE media_culture DROP FOREIGN KEY FK_D77E1AA269C54407');
        $this->addSql('ALTER TABLE media_gastronomie DROP FOREIGN KEY FK_34EB004EB7CE1778');
        $this->addSql('ALTER TABLE texte_culture DROP FOREIGN KEY FK_CFBCBBC88B203A57');
        $this->addSql('ALTER TABLE texte_culture DROP FOREIGN KEY FK_CFBCBBC869C54407');
        $this->addSql('ALTER TABLE texte_gastronomie DROP FOREIGN KEY FK_526A0DE4B7CE1778');
        $this->addSql('DROP TABLE culture_du_monde');
        $this->addSql('DROP TABLE culture_urbaine');
        $this->addSql('DROP TABLE evenement_culture');
        $this->addSql('DROP TABLE gastronomie_dalle');
        $this->addSql('DROP TABLE media_culture');
        $this->addSql('DROP TABLE media_gastronomie');
        $this->addSql('DROP TABLE texte_culture');
        $this->addSql('DROP TABLE texte_gastronomie');
    }
}
