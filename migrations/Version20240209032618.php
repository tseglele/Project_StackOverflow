<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209032618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrator_tag (administrator_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_5ACEBA1A4B09E92C (administrator_id), INDEX IDX_5ACEBA1ABAD26311 (tag_id), PRIMARY KEY(administrator_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_question (tag_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_80C63295BAD26311 (tag_id), INDEX IDX_80C632951E27F6BF (question_id), PRIMARY KEY(tag_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE administrator_tag ADD CONSTRAINT FK_5ACEBA1A4B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE administrator_tag ADD CONSTRAINT FK_5ACEBA1ABAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_question ADD CONSTRAINT FK_80C63295BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_question ADD CONSTRAINT FK_80C632951E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrator_tag DROP FOREIGN KEY FK_5ACEBA1A4B09E92C');
        $this->addSql('ALTER TABLE administrator_tag DROP FOREIGN KEY FK_5ACEBA1ABAD26311');
        $this->addSql('ALTER TABLE tag_question DROP FOREIGN KEY FK_80C63295BAD26311');
        $this->addSql('ALTER TABLE tag_question DROP FOREIGN KEY FK_80C632951E27F6BF');
        $this->addSql('DROP TABLE administrator_tag');
        $this->addSql('DROP TABLE tag_question');
    }
}
