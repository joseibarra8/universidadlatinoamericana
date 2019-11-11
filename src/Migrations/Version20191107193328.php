<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191107193328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documento ADD usuario_registro_id INT NOT NULL');
        $this->addSql('ALTER TABLE documento ADD CONSTRAINT FK_B6B12EC71EEFD20 FOREIGN KEY (usuario_registro_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_B6B12EC71EEFD20 ON documento (usuario_registro_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documento DROP FOREIGN KEY FK_B6B12EC71EEFD20');
        $this->addSql('DROP INDEX IDX_B6B12EC71EEFD20 ON documento');
        $this->addSql('ALTER TABLE documento DROP usuario_registro_id');
    }
}
