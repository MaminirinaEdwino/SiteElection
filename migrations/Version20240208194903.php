<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240208194903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur ADD nom VARCHAR(50) NOT NULL, ADD niveau VARCHAR(50) NOT NULL, DROP nom_admin, DROP niveau_admin, CHANGE mdp_admin mdp VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B15BF1A1708');
        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B15F847B077');
        $this->addSql('DROP INDEX IDX_3C663B15BF1A1708 ON candidats');
        $this->addSql('DROP INDEX UNIQ_3C663B15F847B077 ON candidats');
        $this->addSql('ALTER TABLE candidats ADD pourcentage DOUBLE PRECISION NOT NULL, ADD identifiant_id INT DEFAULT NULL, ADD election_id INT DEFAULT NULL, DROP poucentage, DROP id_electeur_id, DROP id_election_id, CHANGE chemin_sary photo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B151016936D FOREIGN KEY (identifiant_id) REFERENCES electeurs (id)');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B15A708DAFF FOREIGN KEY (election_id) REFERENCES elections (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C663B151016936D ON candidats (identifiant_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C663B15A708DAFF ON candidats (election_id)');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EEA89D6F85');
        $this->addSql('DROP INDEX IDX_E2E2D1EEA89D6F85 ON commune');
        $this->addSql('ALTER TABLE commune ADD nom VARCHAR(255) NOT NULL, ADD code VARCHAR(10) NOT NULL, DROP nom_commune, DROP code_commune, CHANGE id_district_id district_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EEB08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EEB08FA272 ON commune (district_id)');
        $this->addSql('ALTER TABLE district DROP FOREIGN KEY FK_31C154871813BD72');
        $this->addSql('DROP INDEX IDX_31C154871813BD72 ON district');
        $this->addSql('ALTER TABLE district ADD nom VARCHAR(255) NOT NULL, ADD code VARCHAR(10) NOT NULL, DROP nom_district, DROP code_district, CHANGE id_region_id region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_31C1548798260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_31C1548798260155 ON district (region_id)');
        $this->addSql('ALTER TABLE electeurs DROP FOREIGN KEY FK_A6C2AB704E5FC02C');
        $this->addSql('DROP INDEX IDX_A6C2AB704E5FC02C ON electeurs');
        $this->addSql('ALTER TABLE electeurs ADD cin VARCHAR(12) NOT NULL, ADD age INT NOT NULL, ADD identifiant VARCHAR(255) NOT NULL, ADD election_id INT DEFAULT NULL, DROP id_fkt, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE deja_vote vote TINYINT(1) NOT NULL, CHANGE id_fokotany_id fokotany_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE electeurs ADD CONSTRAINT FK_A6C2AB70564D0DDB FOREIGN KEY (fokotany_id) REFERENCES fokotany (id)');
        $this->addSql('ALTER TABLE electeurs ADD CONSTRAINT FK_A6C2AB70A708DAFF FOREIGN KEY (election_id) REFERENCES elections (id)');
        $this->addSql('CREATE INDEX IDX_A6C2AB70564D0DDB ON electeurs (fokotany_id)');
        $this->addSql('CREATE INDEX IDX_A6C2AB70A708DAFF ON electeurs (election_id)');
        $this->addSql('ALTER TABLE elections ADD debut TIME NOT NULL, ADD fin TIME NOT NULL, ADD candidat INT NOT NULL, ADD electeur INT NOT NULL, ADD elu_id INT DEFAULT NULL, DROP heure_debut, DROP heure_fin, DROP nombre_candidat, DROP nombre_electeur, DROP elu, CHANGE date_election date DATE NOT NULL, CHANGE taux_participation participation DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE elections ADD CONSTRAINT FK_1BD26F3370D8E98A FOREIGN KEY (elu_id) REFERENCES candidats (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1BD26F3370D8E98A ON elections (elu_id)');
        $this->addSql('ALTER TABLE fokotany DROP FOREIGN KEY FK_8E64C31B690CFA5');
        $this->addSql('DROP INDEX IDX_8E64C31B690CFA5 ON fokotany');
        $this->addSql('ALTER TABLE fokotany ADD nom VARCHAR(255) NOT NULL, ADD code VARCHAR(10) NOT NULL, DROP nom_fokotany, DROP code_fokotany, CHANGE id_commune_id commune_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fokotany ADD CONSTRAINT FK_8E64C31131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('CREATE INDEX IDX_8E64C31131A4F72 ON fokotany (commune_id)');
        $this->addSql('ALTER TABLE region ADD nom VARCHAR(255) NOT NULL, ADD code VARCHAR(10) NOT NULL, DROP nom_region, DROP code_region');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur ADD nom_admin VARCHAR(50) NOT NULL, ADD niveau_admin VARCHAR(50) NOT NULL, DROP nom, DROP niveau, CHANGE mdp mdp_admin VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B151016936D');
        $this->addSql('ALTER TABLE candidats DROP FOREIGN KEY FK_3C663B15A708DAFF');
        $this->addSql('DROP INDEX UNIQ_3C663B151016936D ON candidats');
        $this->addSql('DROP INDEX UNIQ_3C663B15A708DAFF ON candidats');
        $this->addSql('ALTER TABLE candidats ADD poucentage DOUBLE PRECISION DEFAULT NULL, ADD id_electeur_id INT DEFAULT NULL, ADD id_election_id INT DEFAULT NULL, DROP pourcentage, DROP identifiant_id, DROP election_id, CHANGE photo chemin_sary VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B15BF1A1708 FOREIGN KEY (id_election_id) REFERENCES elections (id)');
        $this->addSql('ALTER TABLE candidats ADD CONSTRAINT FK_3C663B15F847B077 FOREIGN KEY (id_electeur_id) REFERENCES electeurs (id)');
        $this->addSql('CREATE INDEX IDX_3C663B15BF1A1708 ON candidats (id_election_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3C663B15F847B077 ON candidats (id_electeur_id)');
        $this->addSql('ALTER TABLE commune DROP FOREIGN KEY FK_E2E2D1EEB08FA272');
        $this->addSql('DROP INDEX IDX_E2E2D1EEB08FA272 ON commune');
        $this->addSql('ALTER TABLE commune ADD nom_commune VARCHAR(50) NOT NULL, ADD code_commune VARCHAR(50) NOT NULL, DROP nom, DROP code, CHANGE district_id id_district_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commune ADD CONSTRAINT FK_E2E2D1EEA89D6F85 FOREIGN KEY (id_district_id) REFERENCES district (id)');
        $this->addSql('CREATE INDEX IDX_E2E2D1EEA89D6F85 ON commune (id_district_id)');
        $this->addSql('ALTER TABLE district DROP FOREIGN KEY FK_31C1548798260155');
        $this->addSql('DROP INDEX IDX_31C1548798260155 ON district');
        $this->addSql('ALTER TABLE district ADD nom_district VARCHAR(50) NOT NULL, ADD code_district VARCHAR(20) NOT NULL, DROP nom, DROP code, CHANGE region_id id_region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE district ADD CONSTRAINT FK_31C154871813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_31C154871813BD72 ON district (id_region_id)');
        $this->addSql('ALTER TABLE electeurs DROP FOREIGN KEY FK_A6C2AB70564D0DDB');
        $this->addSql('ALTER TABLE electeurs DROP FOREIGN KEY FK_A6C2AB70A708DAFF');
        $this->addSql('DROP INDEX IDX_A6C2AB70564D0DDB ON electeurs');
        $this->addSql('DROP INDEX IDX_A6C2AB70A708DAFF ON electeurs');
        $this->addSql('ALTER TABLE electeurs ADD id_fkt VARCHAR(20) NOT NULL, ADD id_fokotany_id INT DEFAULT NULL, DROP cin, DROP age, DROP identifiant, DROP fokotany_id, DROP election_id, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE prenom prenom VARCHAR(50) NOT NULL, CHANGE vote deja_vote TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE electeurs ADD CONSTRAINT FK_A6C2AB704E5FC02C FOREIGN KEY (id_fokotany_id) REFERENCES fokotany (id)');
        $this->addSql('CREATE INDEX IDX_A6C2AB704E5FC02C ON electeurs (id_fokotany_id)');
        $this->addSql('ALTER TABLE elections DROP FOREIGN KEY FK_1BD26F3370D8E98A');
        $this->addSql('DROP INDEX UNIQ_1BD26F3370D8E98A ON elections');
        $this->addSql('ALTER TABLE elections ADD heure_debut TIME NOT NULL, ADD heure_fin TIME NOT NULL, ADD nombre_candidat INT NOT NULL, ADD nombre_electeur VARCHAR(255) NOT NULL, ADD elu INT NOT NULL, DROP debut, DROP fin, DROP candidat, DROP electeur, DROP elu_id, CHANGE date date_election DATE NOT NULL, CHANGE participation taux_participation DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE fokotany DROP FOREIGN KEY FK_8E64C31131A4F72');
        $this->addSql('DROP INDEX IDX_8E64C31131A4F72 ON fokotany');
        $this->addSql('ALTER TABLE fokotany ADD nom_fokotany VARCHAR(50) NOT NULL, ADD code_fokotany VARCHAR(20) NOT NULL, DROP nom, DROP code, CHANGE commune_id id_commune_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fokotany ADD CONSTRAINT FK_8E64C31B690CFA5 FOREIGN KEY (id_commune_id) REFERENCES commune (id)');
        $this->addSql('CREATE INDEX IDX_8E64C31B690CFA5 ON fokotany (id_commune_id)');
        $this->addSql('ALTER TABLE region ADD nom_region VARCHAR(50) NOT NULL, ADD code_region VARCHAR(20) NOT NULL, DROP nom, DROP code');
    }
}
