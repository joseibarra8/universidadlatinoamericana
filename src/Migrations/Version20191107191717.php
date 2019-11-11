<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191107191717 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE documento (id INT AUTO_INCREMENT NOT NULL, modalidad VARCHAR(3) NOT NULL, campus VARCHAR(3) NOT NULL, nivel VARCHAR(3) NOT NULL, rvoe VARCHAR(15) NOT NULL, clave_programa VARCHAR(30) NOT NULL, tipo_documento VARCHAR(5) NOT NULL, matricula VARCHAR(15) NOT NULL, file_name VARCHAR(50) NOT NULL, file_type VARCHAR(100) NOT NULL, file_size INT NOT NULL, file_data LONGBLOB NOT NULL, usuario_registro INT NOT NULL, fecha_registro DATETIME NOT NULL, ultima_actualizacion DATETIME NOT NULL, status INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE documento');
    }
}
