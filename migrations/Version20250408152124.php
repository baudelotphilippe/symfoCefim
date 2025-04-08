<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250408152124 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE materiel_soiree (id SERIAL NOT NULL, materiel_id INT DEFAULT NULL, soiree_id INT DEFAULT NULL, quantite INT NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DFC1EAE516880AAF ON materiel_soiree (materiel_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DFC1EAE5BA021F7B ON materiel_soiree (soiree_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE materiel_soiree ADD CONSTRAINT FK_DFC1EAE516880AAF FOREIGN KEY (materiel_id) REFERENCES materiel (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE materiel_soiree ADD CONSTRAINT FK_DFC1EAE5BA021F7B FOREIGN KEY (soiree_id) REFERENCES soiree (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE materiel_soiree DROP CONSTRAINT FK_DFC1EAE516880AAF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE materiel_soiree DROP CONSTRAINT FK_DFC1EAE5BA021F7B
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE materiel_soiree
        SQL);
    }
}
