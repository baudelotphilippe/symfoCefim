<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250408151849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE artiste (id SERIAL NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE artiste_soiree (artiste_id INT NOT NULL, soiree_id INT NOT NULL, PRIMARY KEY(artiste_id, soiree_id))
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_496EC6D321D25844 ON artiste_soiree (artiste_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_496EC6D3BA021F7B ON artiste_soiree (soiree_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE artiste_soiree ADD CONSTRAINT FK_496EC6D321D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE artiste_soiree ADD CONSTRAINT FK_496EC6D3BA021F7B FOREIGN KEY (soiree_id) REFERENCES soiree (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE artiste_soiree DROP CONSTRAINT FK_496EC6D321D25844
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE artiste_soiree DROP CONSTRAINT FK_496EC6D3BA021F7B
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE artiste
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE artiste_soiree
        SQL);
    }
}
