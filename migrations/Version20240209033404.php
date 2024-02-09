<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209033404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD admin_id_id INT DEFAULT NULL, ADD member_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DF6E65AD FOREIGN KEY (admin_id_id) REFERENCES administrator (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491D650BA4 FOREIGN KEY (member_id_id) REFERENCES `member` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649DF6E65AD ON user (admin_id_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6491D650BA4 ON user (member_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DF6E65AD');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491D650BA4');
        $this->addSql('DROP INDEX IDX_8D93D649DF6E65AD ON user');
        $this->addSql('DROP INDEX IDX_8D93D6491D650BA4 ON user');
        $this->addSql('ALTER TABLE user DROP admin_id_id, DROP member_id_id');
    }
}
