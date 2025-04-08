<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250408131228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE categorie (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE categorie_formation (categorie_id INT NOT NULL, formation_id INT NOT NULL, PRIMARY KEY(categorie_id, formation_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_ED1F2EB8BCF5E72D ON categorie_formation (categorie_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_ED1F2EB85200282E ON categorie_formation (formation_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categorie_formation ADD CONSTRAINT FK_ED1F2EB8BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categorie_formation ADD CONSTRAINT FK_ED1F2EB85200282E FOREIGN KEY (formation_id) REFERENCES formation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categorie_formation DROP CONSTRAINT FK_ED1F2EB8BCF5E72D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE categorie_formation DROP CONSTRAINT FK_ED1F2EB85200282E
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE categorie
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE categorie_formation
        SQL);
    }
}
