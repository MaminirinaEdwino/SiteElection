<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209175448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE elections ADD region_id INT DEFAULT NULL, ADD district_id INT DEFAULT NULL, ADD commune_id INT DEFAULT NULL, ADD fokotany_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE elections ADD CONSTRAINT FK_1BD26F3398260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE elections ADD CONSTRAINT FK_1BD26F33B08FA272 FOREIGN KEY (district_id) REFERENCES district (id)');
        $this->addSql('ALTER TABLE elections ADD CONSTRAINT FK_1BD26F33131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
        $this->addSql('ALTER TABLE elections ADD CONSTRAINT FK_1BD26F33564D0DDB FOREIGN KEY (fokotany_id) REFERENCES fokotany (id)');
        $this->addSql('CREATE INDEX IDX_1BD26F3398260155 ON elections (region_id)');
        $this->addSql('CREATE INDEX IDX_1BD26F33B08FA272 ON elections (district_id)');
        $this->addSql('CREATE INDEX IDX_1BD26F33131A4F72 ON elections (commune_id)');
        $this->addSql('CREATE INDEX IDX_1BD26F33564D0DDB ON elections (fokotany_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE elections DROP FOREIGN KEY FK_1BD26F3398260155');
        $this->addSql('ALTER TABLE elections DROP FOREIGN KEY FK_1BD26F33B08FA272');
        $this->addSql('ALTER TABLE elections DROP FOREIGN KEY FK_1BD26F33131A4F72');
        $this->addSql('ALTER TABLE elections DROP FOREIGN KEY FK_1BD26F33564D0DDB');
        $this->addSql('DROP INDEX IDX_1BD26F3398260155 ON elections');
        $this->addSql('DROP INDEX IDX_1BD26F33B08FA272 ON elections');
        $this->addSql('DROP INDEX IDX_1BD26F33131A4F72 ON elections');
        $this->addSql('DROP INDEX IDX_1BD26F33564D0DDB ON elections');
        $this->addSql('ALTER TABLE elections DROP region_id, DROP district_id, DROP commune_id, DROP fokotany_id');
    }
}
