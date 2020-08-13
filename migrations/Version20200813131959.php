<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200813131959 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte ADD idclient_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF6526067F0C0D4 FOREIGN KEY (idclient_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_CFF6526067F0C0D4 ON compte (idclient_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF6526067F0C0D4');
        $this->addSql('DROP INDEX IDX_CFF6526067F0C0D4 ON compte');
        $this->addSql('ALTER TABLE compte DROP idclient_id');
    }
}
