<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208190835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, nom_admin VARCHAR(50) NOT NULL, niveau_admin VARCHAR(50) NOT NULL, mdp_admin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE candidats (id INT AUTO_INCREMENT NOT NULL, motif VARCHAR(255) NOT NULL, chemin_sary VARCHAR(255) NOT NULL, poucentage DOUBLE PRECISION DEFAULT NULL, id_electeur_id INT DEFAULT NULL, id_election_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_3C663B15F847B077 (id_electeur_id), INDEX IDX_3C663B15BF1A1708 (id_election_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, nom_commune VARCHAR(50) NOT NULL, code_commune VARCHAR(50) NOT NULL, id_district_id INT DEFAULT NULL, INDEX IDX_E2E2D1EEA89D6F85 (id_district_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE district (id INT AUTO_INCREMENT NOT NULL, nom_district VARCHAR(50) NOT NULL, code_district VARCHAR(20) NOT NULL, id_region_id INT DEFAULT NULL, INDEX IDX_31C154871813BD72 (id_region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE electeurs (id INT AUTO_INCREMENT NOT NULL, id_fkt VARCHAR(20) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(15) NOT NULL, mdp VARCHAR(255) NOT NULL, deja_vote TINYINT(1) NOT NULL, id_fokotany_id INT DEFAULT NULL, INDEX IDX_A6C2AB704E5FC02C (id_fokotany_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE elections (id INT AUTO_INCREMENT NOT NULL, date_election DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, nombre_candidat INT NOT NULL, nombre_electeur VARCHAR(255) NOT NULL, taux_participation DOUBLE PRECISION NOT NULL, elu INT NOT NULL, pourcentage DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE entity1 (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE fokotany (id INT AUTO_INCREMENT NOT NULL, nom_fokotany VARCHAR(50) NOT NULL, code_fokotany VARCHAR(20) NOT NULL, id_commune_id INT DEFAULT NULL, INDEX IDX_8E64C31B690CFA5 (id_commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom_region VARCHAR(50) NOT NULL, code_region VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B15F847B077 FOREIGN KEY (id_electeur_id) REFERENCES electeurs (id)');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B15BF1A1708 FOREIGN KEY (id_election_id) REFERENCES elections (id)');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EEA89D6F85 FOREIGN KEY (id_district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_31C154871813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE electeurs ADD CONSTRAINT FK_A6C2AB704E5FC02C FOREIGN KEY (id_fokotany_id) REFERENCES fokotany (id)');
        $this->addSql('ALTER TABLE fokotany ADD CONSTRAINT FK_8E64C31B690CFA5 FOREIGN KEY (id_commune_id) REFERENCES commune (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B15F847B077');
        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B15BF1A1708');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EEA89D6F85');
        $this->addSql('ALTER TABLE district DROP FOREIGN KEY FK_31C154871813BD72');
        $this->addSql('ALTER TABLE electeurs DROP FOREIGN KEY FK_A6C2AB704E5FC02C');
        $this->addSql('ALTER TABLE fokotany DROP FOREIGN KEY FK_8E64C31B690CFA5');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE candidats');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE district');
        $this->addSql('DROP TABLE electeurs');
        $this->addSql('DROP TABLE elections');
        $this->addSql('DROP TABLE entity1');
        $this->addSql('DROP TABLE fokotany');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
